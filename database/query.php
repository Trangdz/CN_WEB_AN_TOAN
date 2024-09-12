<?php
function query($sql, $data = [])
{
    global $conn;
    $statement = null;
    try {
        $statement = $conn->prepare($sql);
        $statement->execute($data);
    } catch (Exception $ex) {
        echo $ex->getMessage();
        die();
    }
    return $statement;
}

// Lấy dữ liệu từ câu lệnh SQL
function getRaw($sql)
{
    $statement = query($sql);
    if ($statement instanceof PDOStatement) {
        $dataFetch = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $dataFetch;
    }
    return false;
}

function insert($table, $data)
{
    //take key
    $keyArr = array_keys($data);
    $field = implode(',', $keyArr);
    $value = ":" . implode(", :", $keyArr);
    $sql = "INSERT INTO " . $table . " (" . $field . ") VALUES (" . $value . ")";
    return query($sql, $data);
}

function firstRaw($sql)
{
    $statement = query($sql);
    $query = null;
    if ($statement instanceof PDOStatement) {
        $query = $statement->fetch(PDO::FETCH_ASSOC);
    }
    return $query;
}
function update($table, $data, $condition)
{
    $colData = '';
    $parmas = [];
    foreach ($data as $key => $value) {
        $colData .= $key . "=:" . $key . ",";
        $parmas[':' . $key] = $value;
    }
    $colData = rtrim($colData, ', ');
    $sql = "UPDATE " . $table . " SET " . $colData . " WHERE " . $condition;
    return query($sql, $parmas);
}


function delete($table, $condition)
{
    $sql = "DELETE FROM " . $table . " WHERE " . $condition;
    return query($sql);
}
