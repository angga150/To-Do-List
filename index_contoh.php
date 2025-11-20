<?php
require ("config.php");

if( isset($_POST['tambahTugas']) ) {

    if( tambahTugasBaru($_POST) > 0 ) {
		echo "<script>
				alert('Tugas berhasil ditambahkan');
			</script>";
			header("Refresh:0");
            exit;
	} else {
		echo mysqli_error($conn);
	}
}

if( isset($_POST['selesai']) ) {

    if( tugasSelesai($_POST) > 0 ) {
		echo "<script>
				alert('Tugas telah selesai dikerjakan');
			</script>";
			header("Refresh:0");
            exit;
	} else {
		echo mysqli_error($conn);
	}

}

$totalTask = totalTask("SELECT * FROM tasks");

$tasks = tasks("SELECT * FROM tasks");

// var_dump($tasks);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Today's Focus - To Do List</title>
    <!-- Load Tailwind CSS -->
    <link rel="stylesheet" href="css/output.css">
    <!-- Load Lucide Icons -->
    <script type="module" src="https://unpkg.com/lucide@latest"></script>

    
</head>
<body>

    <!-- Kontainer Utama Aplikasi -->
    <div id="app" class="flex p-4 gap-6 justify-between h-screen max-h-screen">

        <!-- Panel Kiri (Navigasi) -->
        <div id="left-panel" class="w-full lg:w-1/7 bg-white/60 backdrop-blur-md rounded-2xl p-6 shadow-2xl flex flex-col transition-all duration-300">
            <!-- Profil Pengguna dan ID -->
            <div class="flex items-center space-x-3 mb-6">
                <div class="w-10 h-10 bg-gray-300 rounded-full flex items-center justify-center">
                    <i data-lucide="user" class="w-5 h-5 text-gray-600"></i>
                </div>
                <div>
                    <p class="font-semibold text-sm">Pengguna</p>
                    <p id="user-id-display" class="text-xs text-gray-600 truncate w-32 md:w-auto">Memuat ID...</p>
                </div>
            </div>

            <!-- Kolom Pencarian -->
            <div class="mb-8">
                <div class="relative">
                    <i data-lucide="search" class="w-4 h-4 text-gray-500 absolute left-3 top-1/2 transform -translate-y-1/2"></i>
                    <input type="text" placeholder="Cari Tugas..." class="w-full pl-10 pr-4 py-2 bg-white rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 shadow-inner">
                </div>
            </div>

            <!-- Bagian TASKS (Tugas) -->
            <div class="mb-8">
                <h3 class="uppercase text-xs font-bold text-gray-500 mb-3 tracking-wider">Tugas</h3>
                <ul id="task-filters" class="space-y-2 text-sm">
                    <li class="flex justify-between items-center p-2 rounded-lg cursor-pointer hover:bg-white/90 transition-colors bg-blue-100 font-medium text-blue-700">
                        <span><i data-lucide="sun" class="w-4 h-4 inline-block mr-2"></i> Hari Ini</span>
                        <span id="counter-today" class="text-xs font-bold bg-blue-200 text-blue-700 px-2 py-0.5 rounded-full"><?= $totalTask; ?></span>
                    </li>
                    <li class="flex justify-between items-center p-2 rounded-lg cursor-pointer hover:bg-white/90 transition-colors">
                        <span><i data-lucide="calendar" class="w-4 h-4 inline-block mr-2"></i> Mendatang</span>
                        <span id="counter-upcoming" class="text-xs font-bold bg-gray-200 px-2 py-0.5 rounded-full"><?= $totalTask; ?></span>
                    </li>
                    <li class="flex justify-between items-center p-2 rounded-lg cursor-pointer hover:bg-white/90 transition-colors">
                        <span><i data-lucide="check-circle" class="w-4 h-4 inline-block mr-2"></i> Selesai</span>
                        <span id="counter-completed" class="text-xs font-bold bg-gray-200 px-2 py-0.5 rounded-full"><?= $totalTask; ?></span>
                    </li>
                    <li class="p-2 cursor-pointer text-blue-500 hover:text-blue-700 transition-colors font-medium">
                        <i data-lucide="plus" class="w-4 h-4 inline-block mr-2"></i> Tambah Tugas Baru
                    </li>
                </ul>
            </div>

            <!-- Bagian LISTS (Daftar) -->
            <div class="mb-8">
                <h3 class="uppercase text-xs font-bold text-gray-500 mb-3 tracking-wider">Daftar</h3>
                <ul id="list-filters" class="space-y-2 text-sm">
                    <li class="flex justify-between items-center p-2 rounded-lg cursor-pointer hover:bg-white/90 transition-colors">
                        <span><span class="inline-block w-2 h-2 rounded-full bg-red-500 mr-2"></span> Pribadi</span>
                        <span class="text-xs font-bold bg-gray-200 px-2 py-0.5 rounded-full">0</span>
                    </li>
                    <li class="flex justify-between items-center p-2 rounded-lg cursor-pointer hover:bg-white/90 transition-colors">
                        <span><span class="inline-block w-2 h-2 rounded-full bg-blue-500 mr-2"></span> Tim A</span>
                        <span class="text-xs font-bold bg-gray-200 px-2 py-0.5 rounded-full">0</span>
                    </li>
                    <li class="flex justify-between items-center p-2 rounded-lg cursor-pointer hover:bg-white/90 transition-colors">
                        <span><span class="inline-block w-2 h-2 rounded-full bg-green-500 mr-2"></span> Tim B</span>
                        <span class="text-xs font-bold bg-gray-200 px-2 py-0.5 rounded-full">0</span>
                    </li>
                    <li class="p-2 cursor-pointer text-blue-500 hover:text-blue-700 transition-colors font-medium">
                        <i data-lucide="plus" class="w-4 h-4 inline-block mr-2"></i> Tambah Daftar Baru
                    </li>
                </ul>
            </div>

            <!-- Bagian TAGS (Tag) -->
            <div class="mb-auto">
                <h3 class="uppercase text-xs font-bold text-gray-500 mb-3 tracking-wider">Tag</h3>
                <div id="tag-filters" class="flex flex-wrap gap-2 text-xs">
                    <span class="bg-gray-200 text-gray-700 px-3 py-1 rounded-full cursor-pointer hover:bg-gray-300">#Proyek</span>
                    <span class="bg-gray-200 text-gray-700 px-3 py-1 rounded-full cursor-pointer hover:bg-gray-300">#Mendesak</span>
                    <span class="text-blue-500 cursor-pointer hover:text-blue-700 font-medium"><i data-lucide="plus" class="w-3 h-3 inline-block mr-1"></i> Tambah Tag</span>
                </div>
            </div>

            <!-- Menu Pengaturan Bawah -->
            <div class="mt-6 border-t pt-4 text-sm text-gray-600">
                <button class="flex items-center space-x-2 hover:text-gray-900 transition-colors">
                    <i data-lucide="settings" class="w-4 h-4"></i>
                    <span>Menu Pengaturan</span>
                </button>
            </div>
        </div>

        <!-- Panel Tengah (Daftar Tugas Hari Ini) -->
        <div id="center-panel" class="w-full lg:w-2/5 flex flex-col transition-all duration-300">
            <header class="mb-6 flex items-baseline justify-between">
                <h1 class="text-6xl font-extrabold drop-shadow-lg">Hari Ini</h1>
                <span id="task-count-total" class="text-6xl font-extrabold  drop-shadow-lg ml-4"><?= $totalTask; ?></span>
            </header>

            <!-- Kontainer Tugas -->
            <?php foreach( $tasks as $task ) : ?>
            <div id="tasks-container" class="flex-grow custom-scroll overflow-y-auto pr-2 space-y-4">
                <div class="glass-panel p-4 bg-white/60 backdrop-blur-md rounded-xl shadow-lg hover:shadow-xl transition duration-200">
                        <!-- Top Content: Title and Description -->
                        <div class="mb-3">
                            <h2 class="text-xl font-semibold text-gray-900 mb-1"><?= $task['title']; ?></h2>
                            <p class="text-sm text-gray-600"><?= $task['description']; ?></p>
                        </div>
                        
                        <!-- Bottom Bar: Dates/Tags and Mark Done Button -->
                        <div class="flex justify-between items-end border-t border-gray-100 pt-3 mt-3">
                            <!-- Dates and Tags Container (Left) -->
                            <div class="flex flex-wrap items-center text-xs text-gray-500 space-x-4">
                                                                <span class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-green-500" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="text-gray-700"><?= $task['deadline']; ?></span>
                                </span>
                                <span class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-red-500" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.414-1.414L11 9.586V6z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="text-gray-700"><?= $task['created']; ?></span>
                                </span>
                                <span class="${listColorClasses} text-xs font-medium px-2 py-0.5 rounded-full"><?= $task['list']; ?></span>
                                    <?php foreach ($task['tags'] as $tag): ?>
                                        <span class="bg-gray-100 text-gray-800 text-xs font-medium px-2 py-0.5 rounded-full">#<?= $tag; ?></span>
                                    <?php endforeach; ?>
                                <span class="bg-gray-100 text-gray-800 text-xs font-medium px-2 py-0.5 rounded-full"><?= $task['priority']; ?></span>
                            </div>

                            <!-- Mark Done Button (Right) -->
                            <form action="" method="post">
                                <input type="hidden" name="taskId" value="<?= $task['task_id']; ?>">
                                <input type="hidden" name="completed" value="Completed">
                            <button type="submit" name="selesai" class="check-button text-sm font-medium text-blue-600 hover:text-blue-800 transition duration-150 border border-blue-300 px-3 py-1 rounded-full bg-blue-50 flex items-center shadow-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                                Selesai
                            </button>
                            </form>
                        </div>
                    </div>
                <!-- Tugas akan dimuat di sini oleh JavaScript -->
                
            </div>
            <?php endforeach; ?>
        </div>

        <!-- Panel Kanan (Formulir Buat Tugas) -->
        <div id="right-panel" class="w-full lg:w-1/5 bg-white/60 backdrop-blur-md rounded-2xl p-6 shadow-2xl flex flex-col transition-all duration-300">
            <h2 class="text-2xl font-bold mb-6">Buat Tugas Baru</h2>

            <form id="create-task-form" class="space-y-4 flex-grow custom-scroll pr-2 overflow-y-auto" method="post">
                <!-- status pending hidden input -->
                <input type="hidden" name="status" value="Pending">
                <input type="hidden" name="created">
                <!-- Judul -->
                <div>
                    <label for="task-title" class="text-sm font-medium block mb-1">Judul</label>
                    <input type="text" id="task-title" name="title" required class="w-full p-2 bg-white rounded-xl border border-gray-300 focus:ring-blue-500 focus:border-blue-500 shadow-inner">
                </div>

                <!-- Deskripsi -->
                <div>
                    <label for="task-description" class="text-sm font-medium block mb-1">Deskripsi</label>
                    <textarea id="task-description" name="description" rows="3" class="w-full p-2 bg-white rounded-xl border border-gray-300 focus:ring-blue-500 focus:border-blue-500 shadow-inner"></textarea>
                </div>

                <!-- Tenggat Waktu -->
                <div>
                    <label for="task-deadline" class="text-sm font-medium block mb-1">Tenggat Waktu</label>
                    <input type="date" id="task-deadline" name="deadline" value="" required class="w-full p-2 bg-white rounded-xl border border-gray-300 focus:ring-blue-500 focus:border-blue-500 shadow-inner">
                </div>

                <!-- Waktu -->
                <div>
                    <label for="task-time" class="text-sm font-medium block mb-1">Waktu</label>
                    <input type="time" id="task-time" name="time" value="13:30" required class="w-full p-2 bg-white rounded-xl border border-gray-300 focus:ring-blue-500 focus:border-blue-500 shadow-inner">
                </div>

                <!-- Tags -->
                <div>
                    <label for="task-tags" class="text-sm font-medium block mb-1">Tags (Pisahkan dengan koma)</label>
                    <input type="text" id="task-tags" name="tags" placeholder="e.g., Tag1, Tag2" class="w-full p-2 bg-white rounded-xl border border-gray-300 focus:ring-blue-500 focus:border-blue-500 shadow-inner">
                </div>

                <!-- Daftar (List) -->
                <div>
                    <label for="task-list" class="text-sm font-medium block mb-1">Daftar</label>
                    <select id="task-list" name="list" class="w-full p-2 bg-white rounded-xl border border-gray-300 focus:ring-blue-500 focus:border-blue-500 shadow-inner appearance-none pr-8">
                        <option value="Pribadi">Pribadi</option>
                        <option value="Tim A">Tim A</option>
                        <option value="Tim B">Tim B</option>
                    </select>
                </div>

                <!-- Prioritas (Priority) -->
                <div>
                    <label for="task-priority" class="text-sm font-medium block mb-1">Prioritas</label>
                    <select id="task-priority" name="priority" class="w-full p-2 bg-white rounded-xl border border-gray-300 focus:ring-blue-500 focus:border-blue-500 shadow-inner appearance-none pr-8">
                        <option value="Tertinggi">Tertinggi</option>
                        <option value="Tinggi">Tinggi</option>
                        <option value="Sedang" selected>Sedang</option>
                        <option value="Rendah">Rendah</option>
                    </select>
                </div>
                <!-- Tombol Aksi Form (Full Width, Bersebelahan) -->
                <div class="mt-6 pt-4 border-t flex space-x-3">
                    <button type="button" id="cancel-form-btn" class="flex-1 px-4 py-2 text-gray-700 bg-gray-200 rounded-xl hover:bg-gray-300 transition-colors font-medium">Batal</button>
                    <button type="submit" form="create-task-form" class="flex-1 px-4 py-2 text-white bg-blue-500 rounded-xl hover:bg-blue-600 transition-colors font-medium shadow-lg shadow-blue-500/50" name="tambahTugas">Buat Tugas</button>
                </div>
            </form>
        </div>

    </div>

</body>
</html>
