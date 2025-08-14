<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Trending Discussions</title>
  <style>
    /* Basic Reset */
    * {
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f8fafc;
      margin: 2rem;
      color: #1e293b; /* dark blue-gray */
    }

    h2 {
      text-align: center;
      margin-bottom: 1.5rem;
      color: #3b82f6; /* primary blue */
    }

    .discussions-grid {
      display: grid;
      gap: 1.5rem;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      max-width: 900px;
      margin: 0 auto;
    }

    .discussion-card {
      background: #ffffff;
      padding: 1.25rem 1.5rem;
      border-radius: 12px;
      box-shadow: 0 2px 8px rgb(0 0 0 / 0.1);
      transition: box-shadow 0.3s ease;
      cursor: pointer;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .discussion-card:hover {
      box-shadow: 0 6px 18px rgb(59 130 246 / 0.3);
    }

    .discussion-title {
      font-size: 1.15rem;
      font-weight: 700;
      color: #1e293b;
      margin-bottom: 0.5rem;
      text-decoration: none;
    }

    .discussion-snippet {
      font-size: 0.95rem;
      color: #475569; /* medium gray */
      flex-grow: 1;
      margin-bottom: 1rem;
      line-height: 1.4;
    }

    .discussion-footer {
      display: flex;
      align-items: center;
      justify-content: space-between;
      font-size: 0.85rem;
      color: #64748b; /* lighter gray */
    }

    .avatars {
      display: flex;
      align-items: center;
    }

    .avatar {
      width: 28px;
      height: 28px;
      border-radius: 50%;
      border: 2px solid white;
      object-fit: cover;
      margin-left: -8px;
      box-shadow: 0 0 0 1px #cbd5e1;
      background-color: #94a3b8; /* fallback color */
    }

    .avatars img:first-child {
      margin-left: 0;
    }

    .comments {
      display: flex;
      align-items: center;
      gap: 6px;
    }

    .comments svg {
      width: 16px;
      height: 16px;
      fill: #3b82f6;
    }

    .last-activity {
      font-style: italic;
      white-space: nowrap;
    }
  </style>
</head>
<body>

  <h2>Trending Discussions</h2>

  <div class="discussions-grid">
    <!-- Discussion Card 1 -->
    <div class="discussion-card" tabindex="0" role="button" aria-label="Open discussion about 'Best fantasy novels of 2025'">
      <a href="#" class="discussion-title">Best fantasy novels of 2025</a>
      <p class="discussion-snippet">What are the most captivating fantasy novels released this year? Share your favorites and why!</p>
      <div class="discussion-footer">
        <div class="avatars" aria-label="Recent participants">
          <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="User avatar" class="avatar" />
          <img src="https://randomuser.me/api/portraits/men/45.jpg" alt="User avatar" class="avatar" />
          <img src="https://randomuser.me/api/portraits/women/12.jpg" alt="User avatar" class="avatar" />
        </div>
        <div class="comments" aria-label="24 comments">
          <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20 2H4c-1.1 0-2 .9-2 2v16l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2z"/></svg>
          24
        </div>
        <div class="last-activity" title="Last activity 3 hours ago">3 hours ago</div>
      </div>
    </div>

    <!-- Discussion Card 2 -->
    <div class="discussion-card" tabindex="0" role="button" aria-label="Open discussion about 'Hidden gems in classic literature'">
      <a href="#" class="discussion-title">Hidden gems in classic literature</a>
      <p class="discussion-snippet">Let's talk about underrated classics that everyone should read but often overlook.</p>
      <div class="discussion-footer">
        <div class="avatars" aria-label="Recent participants">
          <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="User avatar" class="avatar" />
          <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="User avatar" class="avatar" />
        </div>
        <div class="comments" aria-label="15 comments">
          <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20 2H4c-1.1 0-2 .9-2 2v16l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2z"/></svg>
          15
        </div>
        <div class="last-activity" title="Last activity yesterday">Yesterday</div>
      </div>
    </div>

    <!-- Discussion Card 3 -->
    <div class="discussion-card" tabindex="0" role="button" aria-label="Open discussion about 'How to get into reading more regularly?'">
      <a href="#" class="discussion-title">How to get into reading more regularly?</a>
      <p class="discussion-snippet">Struggling to build a reading habit? Share your tips and motivational tricks here.</p>
      <div class="discussion-footer">
        <div class="avatars" aria-label="Recent participants">
          <img src="https://randomuser.me/api/portraits/women/25.jpg" alt="User avatar" class="avatar" />
          <img src="https://randomuser.me/api/portraits/men/51.jpg" alt="User avatar" class="avatar" />
          <img src="https://randomuser.me/api/portraits/men/7.jpg" alt="User avatar" class="avatar" />
          <img src="https://randomuser.me/api/portraits/women/81.jpg" alt="User avatar" class="avatar" />
        </div>
        <div class="comments" aria-label="39 comments">
          <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20 2H4c-1.1 0-2 .9-2 2v16l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2z"/></svg>
          39
        </div>
        <div class="last-activity" title="Last activity 1 hour ago">1 hour ago</div>
      </div>
    </div>
  </div>

</body>
</html>
