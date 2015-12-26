<?php

/**
 * Created by IntelliJ IDEA.
 * User: Dell
 * Date: 12/26/2015
 * Time: 2:32 PM
 */

class StatisticsMaker
{
    public static function metadataStatistics() {
        $conn = mysqli_connect('localhost', 'root', '', 'nutch');
        if(!$conn) {
            die(mysqli_error($conn));
        }

        $query = "select baseUrl from webpage where aq_md_description is null or aq_md_description like '%%'".
            "or aq_md_searchstring is null or aq_md_searchstring like '%%'";

        $results = $conn->query($query);

        foreach(mysqli_fetch_assoc($results) as $row) {
            echo $row['baseUrl']."\n";
        }
    }
}