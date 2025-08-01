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
            <div class="" id="more">

                <a href="" class="" >
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 344 384">
                <path fill="currentColor" d="M42.5 149q17.5 0 30 12.5T85 192t-12.5 30.5t-30 12.5t-30-12.5T0 192t12.5-30.5t30-12.5zm256 0q17.5 0 30 12.5T341 192t-12.5 30.5t-30 12.5t-30-12.5T256 192t12.5-30.5t30-12.5zm-128 0q17.5 0 30 12.5T213 192t-12.5 30.5t-30 12.5t-30-12.5T128 192t12.5-30.5t30-12.5z"/></svg>
                </a>

                <div id="morc" class="hidden absolute w-[170px] bg-sky-300  rounded-lg ">
                    <button class="pl-2 pr-2 p-1">Delete</button>
               
                </div>
            </div>
            </div>
            
            <?php endforeach; ?>
    </div>

</div>


<div id="crtform" class="hidden w-full rounded-xl mt-2 border-1 border-gray-400/40 p-2">
    
<form action="<?=BASEURL;?>home/tambah" method="post">
    <input type="text" name="title" id="title" placeholder="Title" class="w-full h-10 text-xl font-medium pl-4  focus:border-none focus:outline-none">

    <input type="text" name="description" id="description" placeholder="Description" class="w-full font-medium border-0 pl-4   focus:border-none focus:outline-none">
 
    <div class="p-4 flex gap-2">
        <div class="flex gap-2 items-center ">
        <input type="radio" name="priority" id="priority1" value="#EF233C" class="hidden peer">
            <label for="priority1" class="flex items-center cursor-pointer text-gray-700 hover:text-red-500 transition-colors duration-200 p-2 rounded-lg peer-checked:bg-red-200">
                        <div class=" mr-2 flex items-center justify-center shrink-0
                                    border-[#EF233C] peer-checked:bg-[#EF233C] text-[#EF233C] transition-colors duration-200">
                                    
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 20 20"><g fill="currentColor"><path d="M9 7a1 1 0 0 1 2 0v4a1 1 0 1 1-2 0V7Z"/><circle cx="10" cy="14" r="1"/>
                            <path fill-rule="evenodd" d="M2 10a8 8 0 1 0 16 0a8 8 0 0 0-16 0Zm14 0a6 6 0 1 1-12 0a6 6 0 0 1 12 0Z" clip-rule="evenodd"/></g></svg>
                        
                        </div>
                    <span class="font-medium text-[#EF233C]">High</span>
            </label>
        </div>

        <div class="flex gap-2 items-center">
        <input type="radio" name="priority" id="priority2" value="#0059DF" class="hidden peer">
        <label for="priority2" class="flex items-center cursor-pointer text-gray-700 hover:text-blue-500 transition-colors duration-200 p-2 rounded-lg peer-checked:bg-blue-200">
                        <div class=" mr-2 flex items-center justify-center shrink-0
                                    border-[#0059DF] peer-checked:bg-[#0059DF] text-[#0059DF] transition-colors duration-200">
                                    
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M6.7 22H2v-9h2l2.7 9zM19.999 9H14V5a3 3 0 0 0-3-3h-1v4L7.1 9.625A5.02 5.02 0 0 0 6 12.76V14l2.1 7h8.337a4 4 0 0 0 3.881-3.03l1.621-6.485A2 2 0 0 0 19.999 9z"/></svg>
                        
                        </div>
                    <span class="font-medium text-[#0059DF]">Medium</span>
            </label>
        </div>

        <div class="flex gap-2 items-center">
        <input type="radio" name="priority" id="priority3" value="#EF942C" class="hidden peer">
                <label for="priority3" class="flex items-center cursor-pointer text-gray-700 hover:text-yellow-500 transition-colors duration-200 p-2 rounded-lg peer-checked:bg-yellow-200">
                        <div class=" mr-2 flex items-center justify-center shrink-0
                                    border-[#EF942C] peer-checked:bg-[#EF942C] text-[#EF942C] transition-colors duration-200">
                                    
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M20.406 10.377a2.754 2.754 0 0 0-1.928-.805H16.24v-.249a.756.756 0 0 0-.745-.745H3.564a.746.746 0 0 0-.746.745v7.954A4.723 4.723 0 0 0 7.541 22h3.977a4.662 4.662 0 0 0 1.8-.368a4.593 4.593 0 0 0 2.555-2.545v-.07h2.575a2.754 2.754 0 0 0 2.734-2.734v-3.977a2.714 2.714 0 0 0-.776-1.929m-.686 5.906a1.252 1.252 0 0 1-.368.875a1.213 1.213 0 0 1-.875.368H16.23a2.104 2.104 0 0 0 0-.249v-6.214h2.238a1.253 1.253 0 0 1 1.242 1.243zM5.94 7.573a.746.746 0 0 1-.527-1.272a.597.597 0 0 0 .14-.209a.557.557 0 0 0 0-.249a.577.577 0 0 0 0-.258a.596.596 0 0 0-.14-.209a2.217 2.217 0 0 1-.636-1.521a2.237 2.237 0 0 1 .636-1.531a.746.746 0 1 1 .994 1.064a.597.597 0 0 0-.139.208a.746.746 0 0 0 0 .259a.736.736 0 0 0 0 .248a.78.78 0 0 0 .15.22a2.108 2.108 0 0 1 .626 1.52a2.068 2.068 0 0 1-.637 1.522a.726.726 0 0 1-.467.208m3.231 0a.756.756 0 0 1-.527-.208a.746.746 0 0 1 0-1.054a.656.656 0 0 0 0-.945a2.068 2.068 0 0 1-.457-.696a2.078 2.078 0 0 1 0-1.64c.11-.263.268-.503.467-.706a.746.746 0 1 1 .995 1.064a.596.596 0 0 0-.14.208a.746.746 0 0 0 0 .259a.736.736 0 0 0 0 .248a.802.802 0 0 0 .15.22a2.147 2.147 0 0 1 0 3.032a.736.736 0 0 1-.488.218m3.47 0a.746.746 0 0 1-.527-1.272a.597.597 0 0 0 .14-.209a.558.558 0 0 0 0-.249a.579.579 0 0 0 0-.258a.597.597 0 0 0-.14-.209a2.178 2.178 0 0 1-.636-1.521a2.108 2.108 0 0 1 .636-1.531a.746.746 0 0 1 1.054 1.054a.477.477 0 0 0-.149.218a.658.658 0 0 0 0 .249a.74.74 0 0 0 0 .249a.616.616 0 0 0 .15.218a2.068 2.068 0 0 1 .625 1.521c.002.283-.052.564-.159.826a2.377 2.377 0 0 1-.467.696a.765.765 0 0 1-.527.218"/></svg>
                        
                        </div>
                    <span class="font-medium text-[#EF942C]">Low</span>
            </label>
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

        const mored = document.getElementById('more');
        const moreContainer =  document.getElementById('morec');

        mored.addEventListener('click', function(event) {
            event.preventDefault(); 
            moreContainer.classList.remove('hidden');


        });

        mored.addEventListener('click', function(event) {
            event.preventDefault(); 
            moreContainer.classList.add('hidden');
            

        });

</script>