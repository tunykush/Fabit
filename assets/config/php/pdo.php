<?php
/**
 * Mở kết nối đến CSDL sử dụng PDO
 */
define('DBHOST', 'localhost');
define('DBUSER', 'root');
define('DBPASS', '');
define('DBNAME', 'tuny_db');

//hàm connect với database
function pdo_get_connection()
{
    $conn = new PDO('mysql:host=' . DBHOST . ';dbname=' . DBNAME, DBUSER, DBPASS);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
}

function mysql_get_connection()
{
    $conn = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
    return $conn;
}

/**
 * Thực thi câu lệnh sql thao tác dữ liệu (INSERT, UPDATE, DELETE)
 * @param string $sql câu lệnh sql
 * @param array $args mảng giá trị cung cấp cho các tham số của $sql
 * @throws PDOException lỗi thực thi câu lệnh
 */

//hàm này để thực hiện những câu lệnh INSERT, UPDATE, DELETE
function pdo_execute($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        return true;
    } 
    catch (PDOException $e) {
        throw $e;
    } 
    finally {
        unset($conn);
    }
    return true;
}

function mysql_execute($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = mysql_get_connection();

        $stmt = $conn->prepare($sql);
        if ($stmt === false) {
            throw new Exception("Prepare failed: " . $conn->error);
        }

        if (!empty($sql_args)) {
            $types = str_repeat('s', count($sql_args));
            $stmt->bind_param($types, ...$sql_args);
        }

        $result = $stmt->execute();

        if (!$result) {
            throw new Exception("Execution failed: " . $stmt->error);
        }

        return $result;
    } catch (Exception $e) {
        throw $e;
    } finally {
        if (isset($stmt)) {
            $stmt->close();
        }
        if (isset($conn)) {
            $conn->close();
        }
    }
}

/**
 * Thực thi câu lệnh sql truy vấn dữ liệu (SELECT)
 * @param string $sql câu lệnh sql
 * @param array $args mảng giá trị cung cấp cho các tham số của $sql
 * @return array mảng các bản ghi
 * @throws PDOException lỗi thực thi câu lệnh
 */

//hàm này để thực hiện  câu lệnh SELECT nhưng SELECT ĐỂ TRẢ 1 mảng giá trị
function pdo_query($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $rows = $stmt->fetchAll();
        return $rows;
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}

function mysqliQuery($sql)
{
    try {
        $conn = mysql_get_connection();


        $result = $conn->query($sql);

        if (!$result) {
            throw new Exception("Execution failed: " . $conn->error);
        }

        return $result;
    } catch (Exception $e) {
        throw $e;
    } finally {
        if (isset($stmt)) {
            $stmt->close();
        }
        if (isset($conn)) {
            $conn->close();
        }
    }
}

/**
 * Thực thi câu lệnh sql truy vấn một bản ghi
 * @param string $sql câu lệnh sql
 * @param array $args mảng giá trị cung cấp cho các tham số của $sql
 * @return array mảng chứa bản ghi
 * @throws PDOException lỗi thực thi câu lệnh
 */

//hàm này để thực hiện  câu lệnh SELECT nhưng SELECT ĐỂ TRẢ 1 giá trị
function pdo_query_one($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}

/**
 * Thực thi câu lệnh sql truy vấn một giá trị
 * @param string $sql câu lệnh sql
 * @param array $args mảng giá trị cung cấp cho các tham số của $sql
 * @return giá trị
 * @throws PDOException lỗi thực thi câu lệnh
 */
function pdo_query_value($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return array_values($row)[0];
    } 
    catch (PDOException $e) {
        throw $e;
    } 
    finally {
        unset($conn);
    }
}