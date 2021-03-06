<div class="header">
  <div class="pure-menu pure-menu-open pure-menu-horizontal">
    <a href=""><?php echo $current_channel.' - '.$view_title;?></a>
    <ul>
      <li class="pure-menu-selected"><a href="/statistics">Statistics</a></li>
      <li><a href="/history">History</a></li>
    </ul>
  </div>
</div>
<div class="content">
    <script>
      var jump_back_time = <?php echo $jump_back_day; ?>,
          current_end_tm = <?php echo $current_end_day; ?>;
    </script>
    <div class="popup_controls">
      <span id="view_selected" class="hide popup_button display_tooltip" data-tooltip="Only show selected activity">
        <i class="fa fa-filter"></i>
      </span>
      <span id="view_range" class="hide popup_button display_tooltip" data-tooltip="Show all activity from first selected to last">
        <i class="fa fa-arrows-v"></i>
      </span>
      <?php if($is_searching): ?>
      <span id="clear_search" class="popup_button display_tooltip" data-tooltip="Clear current search/filters">
        <i class="fa fa-search-minus"></i>
      </span>
      <?php endif; ?>
      <span id="search" class="popup_button display_tooltip" data-tooltip="Search for a specific Term">
        <input id="search_field" class="hide" /><i class="fa fa-search"></i>
      </span>
      <span id="view_previous_day" class="popup_button display_tooltip" data-tooltip="Show more history">
        <i class="fa fa-history"></i>
      </span>
      <span id="jump_to_top" class="popup_button display_tooltip" data-tooltip="Scroll to top">
        <i class="fa fa-arrow-circle-up"></i>
      </span>
      <span id="jump_to_bottom" class="popup_button display_tooltip" data-tooltip="Scroll to bottom">
        <i class="fa fa-arrow-circle-down"></i>
      </span>
    </div>
    <div class="popup_tooltip">
    </div>
    <div class="history">
<?php foreach($history as $a_h): ?>
  <?php if($a_h['type'] == 'MESSAGE'): ?>
      <div class="irc_message" data-id="<?php echo $a_h['id'];?>">
        <span class="irc_time"><?php echo getDateString($a_h['time']); ?></span>
        <span>&lt;<span class="irc_nick"><?php echo $a_h['nick']; ?></span>&gt; </span>
        <span class="irc_message"><?php echo linkify(sanitize(convert_ascii($a_h['message']))); ?></span>
      </div>
  <?php elseif($a_h['type'] == 'ACTION'): ?>
      <div class="irc_action" data-id="<?php echo $a_h['id'];?>">
        <span class="irc_time"><?php echo getDateString($a_h['time']); ?></span>
        <span>* <span class="irc_nick"><?php echo $a_h['nick']; ?></span></span>
        <span class="irc_message"><?php echo linkify(sanitize(convert_ascii($a_h['message']))); ?></span>
      </div>
  <?php endif; ?>
<?php endforeach; ?>
    </div>
</div>
