<!DOCTYPE html>
<html lang="en">
    <x-layout.head title="{{ $article->title ?? 'Judul Artikel' }}" :styles="true" /> {{-- Pastikan :styles="true" jika ingin memuat style.css via Vite --}}
<body>
<div class="article-detail-container">
  <header class="article-header">
    <h1 class="article-title">{{ $article->title }}</h1>
    <div class="article-meta">
      <time datetime="{{ $article->created_at->toDateString() }}">
        {{ $article->created_at->format('d M Y') }}
      </time>
    </div>
    <div class="article-extras">
      <div class="reading-time">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
        5 min read
      </div>
      <div class="category-tag">
        {{ $article->category ?? 'Technology' }}
      </div>
    </div>
  </header>

  <div class="article-image">
    @if($article->photo)
      <img src="{{ Storage::disk('s3')->url($article->photo) }}" alt="{{ $article->title }}" />
    @else
      <div class="no-image">No Image Available</div>
    @endif
  </div>

  <div class="article-body">
    <p>{{ $article->description }}</p>
    {!! $article->content !!}
  </div>

  <footer class="article-footer">
    <div class="share-buttons">
      <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" 
         target="_blank" rel="noopener" class="share-button facebook" title="Share on Facebook">
        FB
      </a>

      <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($article->title) }}" 
         target="_blank" rel="noopener" class="share-button twitter" title="Share on Twitter">
        TW
      </a>

      <a href="https://wa.me/?text={{ urlencode($article->title . ' ' . request()->fullUrl()) }}" 
         target="_blank" rel="noopener" class="share-button whatsapp" title="Share on WhatsApp">
        WA
      </a>
    </div>

    <div class="back-to-articles">
      <a href="{{ url('/') }}" class="back-link" title="Back to Articles">
        ← Back to Articles
      </a>
    </div>
  </footer>

  <section class="related-articles">
    <h3>Related Articles</h3>
    <ul>
      @foreach($relatedArticles as $related)
      <li>
        <a href="{{ url('articles/' . $related->id) }}" class="article-link">{{ $related->title }}</a>
        <span>{{ $related->created_at->format('d M Y') }}</span>
      </li>
      @endforeach
    </ul>
  </section>
</div>
</body>
</html>