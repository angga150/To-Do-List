<?php
$conn = mysqli_connect("localhost","root","","todolist");

function tasks($query) { 
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        // ambil semua tag untuk task ini
        $tagQuery = "SELECT tags.tag_name 
                     FROM tags 
                     JOIN todotag ON tags.id_tag = todotag.tag_id 
                     WHERE todotag.task_id = {$row['task_id']}";
        $tagResult = mysqli_query($conn, $tagQuery);

        $tags = [];
        while ($tagRow = mysqli_fetch_assoc($tagResult)) {
            $tags[] = $tagRow['tag_name'];
        }

        // tambahkan tags ke dalam data task
        $row['tags'] = $tags;
        $rows[] = $row;
    }

    return $rows;
}

function tambahTugasBaru($data) {
	global $conn;

	$title = $data["title"];
	$desk = $data["description"];
	$list = $data['list'];
	$priority = $data['priority'];
	$status = $data['status'];
	$created = date('Y-m-d H:i:s');

	$tags = explode(',', $data['tags']);
	
	// deadline dan time jadi satu datetime
	$tanggal = $data["deadline"];
	$time = $data["time"];
	// Gabungkan jadi satu datetime
    $deadline = $tanggal . ' ' . $time . ':00'; // hasil: 2025-10-16 14:30:00

	// tambahkan tugas ke databases
	mysqli_query($conn, "INSERT INTO tasks VALUES('','$title','$desk','$priority','$status','$deadline','$list','$created')");
	$tasks_id = mysqli_insert_id($conn);

    // Cek dan simpan setiap tag
    foreach ($tags as $tag) {
        $tag = trim($tag);
        if ($tag == '') continue;

        // cek apakah tag sudah ada 
        $check = mysqli_query($conn, "SELECT id_tag FROM tags WHERE tag_name='$tag'");
        if (mysqli_num_rows($check) > 0) {
            $row = mysqli_fetch_assoc($check);
            $tag_id = $row['id_tag'];
        } else {
            mysqli_query($conn, "INSERT INTO tags VALUES ('', '$tag')");
            $tag_id = mysqli_insert_id($conn);
        }

        //  Buat relasi
        mysqli_query($conn, "INSERT INTO todotag VALUES ('',$tasks_id, $tag_id)");
    }

	return mysqli_affected_rows($conn);
}

function tugasSelesai($data) {
	global $conn;

	$id = $data["taskId"];
	$status = $data["completed"];
	mysqli_query($conn, "UPDATE tasks SET status = '$status' WHERE task_id = '$id'");
	return mysqli_affected_rows($conn);
}

function totalTask($query) {
	global $conn;

	$result = mysqli_query($conn, $query);
	$jumlah_baris = mysqli_num_rows($result);

	return mysqli_affected_rows($conn);
}
?>