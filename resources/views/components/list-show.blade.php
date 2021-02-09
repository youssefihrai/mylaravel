
  @foreach ($items as $item)
  <div class="detailed mt">
    <h4>Recent Activity</h4>
    <div class="recent-activity">

      <div class="activity-panel">
        <h5>{{ $item->content }}</h5>
        <p>{{ $item->created_at }}</p>
      </div>
    </div>
    <!-- /recent-activity -->
  </div>
  @endforeach
