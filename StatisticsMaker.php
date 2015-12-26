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

        $query = "select baseUrl, aq_md_searchstring, aq_md_description from webpage where baseUrl is not null and aq_md_description is null or aq_md_description like ''".
            "or aq_md_searchstring is null or aq_md_searchstring like ''";

        $results = $conn->query($query);

        while ($row = mysqli_fetch_assoc($results)) {
            echo $row['baseUrl']."\n";
            echo "EMPTY: ";
            if(!isset($row['aq_md_description']) || empty($row['aq_md_description'])) {
                echo "description";
            }
            if(!isset($row['aq_md_searchstring']) || empty($row['aq_md_searchstring'])) {
                echo " keywords";
            }
            echo "\n\n";
        }
        mysqli_close($conn);
    }
}