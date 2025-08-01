
<div class="flex">

    


<div class="ml-[300px] w-full h-[100vh]">
    <div class=" ml-72 mr-72 mt-20">

    <div class="items-center mb-6">
    <h1 class="font-bold text-2xl">My Todo List</h1>
    <h2 class="font-medium"> 0 Task</h2>
    </div>

<div class="justify-items-center ">
    <div class="w-full rounded-xl">
        <?php foreach( $data['task'] as $task ) :  ?>
            <div class="mb-4 bg-[#1A7DCE] p-2 rounded-xl">
            <div class="flex items-center ">
            <div class="bg-[<?= $task['priority'];?>] w-6 h-6 rounded-full mr-2">
            </div>
            <h1 class="text-lg font-medium text-white"><?= $task['title']; ?></h1>
            </div>
            <p class="ml-8 text-white"><?= $task['description']; ?></p>
            <div class="">

                <a href="">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 344 384">
                <path fill="currentColor" d="M42.5 149q17.5 0 30 12.5T85 192t-12.5 30.5t-30 12.5t-30-12.5T0 192t12.5-30.5t30-12.5zm256 0q17.5 0 30 12.5T341 192t-12.5 30.5t-30 12.5t-30-12.5T256 192t12.5-30.5t30-12.5zm-128 0q17.5 0 30 12.5T213 192t-12.5 30.5t-30 12.5t-30-12.5T128 192t12.5-30.5t30-12.5z"/></svg>
                </a>

            </div>
            </div>
            
            <?php endforeach; ?>
    </div>

</div>


<div id="crtform" class="hidden w-full rounded-xl mt-2 border-1 border-gray-400/40 p-4">
    
<form action="<?=BASEURL;?>home/tambah" method="post">
    <input type="text" name="title" id="title" placeholder="Title" class="rounded-xl w-full h-10 text-2xl font-medium p-4  focus:border-none focus:outline-none">

    <input type="text" name="description" id="description" placeholder="Description" class="rounded-xl w-full font-medium border-0 p-4   focus:border-none focus:outline-none">
 
    <div class="p-4 flex gap-2">
        <div class=" flex gap-2 items-center">
        <input type="radio" name="priority" id="priority" value="#EF233C" class="h-5 w-5 text-red-600 bg-gray-100 border-gray-300 focus:ring-red-500">
        
        </div>

        <div class="flex gap-2 items-center">
        <input type="radio" name="priority" id="priority" value="#0059DF" class="h-5 w-5">
        
        </div>

        <div class="flex gap-2 items-center">
        <input type="radio" name="priority" id="priority" value="#EF942C" class="h-5 w-5">
        
        </div>
    
    
    </div>
   
    <div class="w-full flex justify-end p-2">
    <button id="cnlbutton" type="button" class="bg-gray-400/50 rounded-lg pt-2 pl-4 pr-4 pb-2 font-medium mr-2 cursor-pointer hover:bg-gray-400 transition duration-200 ease-in-out hover:transition hover:duration-200 hover:ease-in-out">Cancel</button>
    <button id="crtbutton" type="submit" class="bg-sky-500 rounded-lg pt-2 pl-4 pr-4 pb-2 font-medium text-[#ffffff] cursor-pointer hover:bg-[#1A7DCE] transition duration-200 ease-in-out hover:transition hover:duration-200 hover:ease-in-out">Add task</button>
    </div>
</form>

</div>


        <div id="addbuttonContainer" class="items-center flex">
                <a id="addbutton" href="" class="flex items-center p-2 text-sky-600 hover:bg-[#1A7DCE] rounded-lg transition duration-200 ease-in-out hover:transition hover:duration-200 hover:ease-in-out hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 20 20">
                    <path fill="currentColor" d="M10 0c5.523 0 10 4.477 10 10s-4.477 10-10 10S0 15.523 0 10S4.477 0 10 0Zm0 5.475a.682.682 0 0 0-.682.681V9.28H6.195a.682.682 0 0 0-.674.582l-.008.1c0 .377.305.682.682.682h3.123v3.123c0 .343.252.626.581.675l.101.007a.682.682 0 0 0 .682-.682l-.001-3.123h3.124a.682.682 0 0 0 .674-.58l.008-.102a.682.682 0 0 0-.682-.681l-3.124-.001V6.156a.682.682 0 0 0-.58-.674Z"/></svg>
                <P class="text-left items-center pl-2 font-medium ">Add task</P>
                </a>
        </div>




</div>
</div>
</div>

<script>
            // Mendapatkan referensi ke elemen-elemen DOM
        const crtform = document.getElementById('crtform');
        const addbuttonContainer = document.getElementById('addbuttonContainer');
        const addbutton = document.getElementById('addbutton');
        const createButton = document.getElementById('crtbutton');
        const cancelButton = document.getElementById('cnlbutton');

        // Menambahkan event listener ke tombol "Add task"
        addbutton.addEventListener('click', function(event) {
            // Mencegah halaman memuat ulang saat link diklik
            event.preventDefault(); 
            // Menyembunyikan tombol 'Add task'
            addbuttonContainer.classList.add('hidden');
            // Menampilkan form 'Create'
            crtform.classList.remove('hidden');
            crtform.classList.add('block');
        });

        // Menambahkan event listener untuk tombol "Tambah" di dalam form
        createButton.addEventListener('click', function(event) {
            // Logika untuk menyimpan data task bisa ditambahkan di sini
            console.log("Tugas baru ditambahkan!");

            // Menyembunyikan form 'Create'
            crtform.classList.add('hidden');
            crtform.classList.remove('block');
            // Menampilkan kembali tombol 'Add task'
            addbuttonContainer.classList.remove('hidden');
        });

        // Menambahkan event listener untuk tombol "Batal" di dalam form
        cancelButton.addEventListener('click', function(event) {
            // Mencegah form untuk melakukan submit dan memuat ulang halaman
            event.preventDefault(); 
            
            // Menyembunyikan form 'Create'
            crtform.classList.add('hidden');
            // Menampilkan kembali tombol 'Add task'
            addbuttonContainer.classList.remove('hidden');
        });
</script>
</body>







