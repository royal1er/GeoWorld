 <?php
 function getFeed($feed_url) {
     
    $content = file_get_contents($feed_url);
    $x = new SimpleXmlElement($content);
     
    echo "<ul class='list-group'>";
     
    foreach($x->channel->item as $entry) {
        echo "<li class='list-group-item'y><a href='$entry->link' title='$entry->title'>" . $entry->title . "</a></li>";
    }
    echo "</ul>";
}
?>