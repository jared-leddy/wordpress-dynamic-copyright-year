function carbondigital_copyright() {
  global $wpdb;
  $copyright_dates = $wpdb->get_results("
    SELECT
    YEAR(min(post_date_gmt)) AS firstdate,
    YEAR(max(post_date_gmt)) AS lastdate
    FROM
    $wpdb->posts
    WHERE
    post_status = 'publish'
  ");
  $output = '';
  if($copyright_dates) {
    $copyright = "&copy; 2014 &#8210; " . $copyright_dates[0]->firstdate;
    if($copyright_dates[0]->firstdate != $copyright_dates[0]->lastdate) {
      $copyright .= '-' . $copyright_dates[0]->lastdate;
    }
    $output = $copyright;
  }
  return $output;
}

<p>Copyright <?php echo carbondigital_copyright(); ?> &middot; Carbon Digital LLC &middot; All Rights Reserved</p>
