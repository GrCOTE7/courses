<?php

/**
 * Request.
 */
function req(string $sql, array $args = [])
{
    include __DIR__ . '/cnx.php';

    try {
        $req = $connection->prepare($sql);
        foreach ($args as $k => $v) {
            $req->bindValue($k+1, $args[$k]);
        }

        $req->execute($args);
    } catch (Exception $e) {
        echo 'Erreur : ' . $e->getMessage() . '<br />';
    }
    return $req->fetchAll(PDO::FETCH_ASSOC);
}
