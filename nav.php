
<nav>
  
    <ul>
        <?php
        
        print '<li ';
        if ($PATH_PARTS['filename'] == 'searcn') {
            print ' class="activePage" ';
        }
        print '><a href="search.php">Search</a></li>';
       
        
        print '<li ';
        if ($PATH_PARTS['filename'] == 'results') {
            print ' class="activePage" ';
        }
        print '><a href="results.php">Results</a></li>';
       
        print '<li ';
        if ($PATH_PARTS['filename'] == 'help') {
            print ' class="activePage" ';
        }
        print '><a href="help.php">Help</a></li>';
        
        print '<li ';
        if ($PATH_PARTS['filename'] == 'sampleQuery') {
            print ' class="activePage" ';
        }
        print '><a href="sampleQuery.php">SampleQuery</a></li>';
        
       
        ?>
    </ul>
</nav>