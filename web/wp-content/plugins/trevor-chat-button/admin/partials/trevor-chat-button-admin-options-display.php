<div class="wrap">
  <h1>Trevor Chat Button Settings</h1>
    <div>
    <form action="options.php" method="POST">
      <?php settings_fields( 'trevor-chat-button' ); ?>
      <?php do_settings_sections( 'trevor-chat-button' ); ?>
      <?php submit_button(); ?>
    </form>
    </div>

  <h1>Last 10 IP Logs</h1>
  <form action="options-general.php?page=trevor-chat-button" method="post">
    <input type="hidden" name="download-logs" value=1 />
    <input type="submit" class="button button-secondary" value="Download last 24 hours" />
  </form>
  <table class="widefat fixed" cellspacing="0">
    <thead>
      <tr>
        <th>ID</th>
        <th>Date</th>
        <th>IP Address</th>
        <th>Country code</th>
        <th>In US?</th> 
        <th>Notes</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($logs as $log): ?>
      <tr>
        <td><?php echo $log->id; ?></td>
        <td><?php echo $log->created_at; ?></td>
        <td><?php echo $log->ip_address; ?></td>
        <td><?php echo $log->country; ?></td>
        <td><?php echo ($log->was_accepted) ? 'Yes' : 'No'; ?></td>
        <td><?php echo substr($log->notes, 0, 100); ?></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>