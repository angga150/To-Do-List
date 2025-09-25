<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['judul']; ?> </title>
    

    <link rel="stylesheet" href="   css/output.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="<?=BASEURL;?>icon/gear.svg">
</head>
<body class="theme-default themed-bg-body">
<div id="sidebar" class="themed-bg-sidebar items-center justify-center flex-shrink-0 overflow-hidden">
<div class="relative"></div>
                <div class="relative">
        <!-- Profil Pengguna (Tombol Dropdown) -->
        <div  class="h-[60px] flex items-center cursor-pointer">
            <div id="user-profile-btn" class="flex pl-4 border-sky-500 items-center w-[300px]">
            <img src="https://placehold.co/40x40/0059DF/FFFFFF?text=H" alt="Profile Image" class="rounded-full w-10 h-10 object-cover" id="profile-img">
            <h1 class="text-left items-center ml-2 w-full font-medium themed-text-white" id="username-display">username</h1>
            </div>
            <!-- Tombol Burger di dalam Sidebar -->
            <div class="flex items-center pr-2">
            <button id="burger-btn-in-sidebar" class="themed-text-white p-2 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M3 18v-2h18v2zm0-5v-2h18v2zm0-5V6h18v2z"/></svg>
            </button>
            </div>
            
        </div>
        
        <!-- Menu Dropdown -->
        <div id="user-dropdown" class="themed-dropdown-bg absolute right-0 md:right-4 left-0 md:left-auto top-full mt-2 w-full md:w-[250px] rounded-lg shadow-lg hidden z-20">
            <button id="account-detail-btn" class="block w-full text-left p-3 themed-dropdown-hover themed-dropdown-text rounded-lg font-medium" data-i18n="account_detail">Detail Akun</button>
            <button id="print-completed-btn" class="block w-full text-left p-3 themed-dropdown-hover themed-dropdown-text rounded-lg font-medium" data-i18n="print_completed">Cetak Tugas Selesai</button>
            <button id="logout-btn" class="block w-full text-left p-3 themed-dropdown-hover themed-dropdown-text rounded-lg font-medium" data-i18n="logout">Keluar</button>
        </div>
    </div>
         
<div class="items-center px-4 pt-4 pb-20">
        <div class="relative mt-4">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                <svg class="w-5 h-5 themed-text-white" viewBox="0 0 24 24" fill="none">
                    <path d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </span>
            <input type="text" class="w-full py-2 pl-10 pr-4 themed-text-white bg-transparent border themed-border-color rounded-md focus:outline-none focus:border-white" placeholder="Search" />
        </div>
        
        <button id="my-list-btn" class="flex items-center p-3 mt-4 themed-bg-secondary rounded-lg themed-text-white transition duration-200 hover:themed-bg-primary w-full">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24">
                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M9 6h12M9 12h12M9 18h8M4 7a1 1 0 1 0 0-2a1 1 0 0 0 0 2Zm0 6a1 1 0 1 0 0-2a1 1 0 0 0 0 2Zm0 6a1 1 0 1 0 0-2a1 1 0 0 0 0 2Z"/></svg>
            <p class="text-left items-center pl-2 font-medium themed-text-white" data-i18n="my_list">My list</p>
        </button>
        <button id="completed-btn" class="flex items-center p-3 mt-2 themed-text-white themed-hover-sidebar/40 rounded-lg transition duration-200 w-full">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 2048 2048">
                <path fill="currentColor" d="m1491 595l90 90l-749 749l-365-365l90-90l275 275l659-659zM1024 0q141 0 272 36t245 103t207 160t160 208t103 245t37 272q0 141-36 272t-103 245t-160 207t-208 160t-245 103t-272 37q-141 0-272-36t-245-103t-207-160t-160-208t-103-244t-37-273q0-141 36-272t103-245t160-207t208-160T751 37t273-37zm0 1920q123 0 237-32t214-90t182-141t140-181t91-214t32-238q0-123-32-237t-90-214t-141-182t-181-140t-214-91t-238-32q-123 0-237 32t-214 90t-182 141t-140 181t-91 214t-32 238q0 123 32 237t90 214t141 182t181 140t214 91t238 32z"/></svg>
            <p class="text-left items-center pl-2 font-medium themed-text-white" data-i18n="completed">Completed</p>
        </button>
    </div>
    <div class="absolute bottom-0 w-full p-4">
        <a href="#" id="settings-btn" class="flex items-center p-3 themed-text-white themed-hover-sidebar rounded-lg transition duration-200">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 16 16"><g fill="none"><g clip-path="url(#gravityUiGear0)"><path fill="currentColor" fill-rule="evenodd" d="M7.199 2H8.8a.2.2 0 0 1 .2.2c0 1.808 1.958 2.939 3.524 2.034a.199.199 0 0 1 .271.073l.802 1.388a.199.199 0 0 1-.073.272c-1.566.904-1.566 3.164 0 4.069a.199.199 0 0 1 .073.271l-.802 1.388a.199.199 0 0 1-.271.073C10.958 10.863 9 11.993 9 13.8a.2.2 0 0 1-.199.2H7.2a.199.199 0 0 1-.2-.2c0-1.808-1.958-2.938-3.524-2.034a.199.199 0 0 1-.272-.073l-.8-1.388a.199.199 0 0 1 .072-.271c1.566-.905 1.566-3.165 0-4.07a.199.199 0 0 1-.073-.271l.801-1.388a.199.199 0 0 1 .272-.073C5.042 5.138 7 4.007 7 2.2c0-.11.089-.199.199-.199ZM5.5 2.2c0-.94.76-1.7 1.699-1.7H8.8c.94 0 1.7.76 1.7 1.7a.85.85 0 0 0 1.274.735a1.699 1.699 0 0 1 2.32.622l.802 1.388c.469.813.19 1.851-.622 2.32a.85.85 0 0 0 0 1.472a1.7 1.7 0 0 1 .622 2.32l-.802 1.388a1.699 1.699 0 0 1-2.32.622a.85.85 0 0 0-1.274.735c0 .939-.76 1.7-1.699 1.7H7.2a1.7 1.7 0 0 1-1.699-1.7a.85.85 0 0 0-1.274-.735a1.698 1.698 0 0 1-2.32-.622l-.802-1.388a1.699 1.699 0 0 1 .622-2.32a.85.85 0 0 0 0-1.471a1.699 1.699 0 0 1-.622-2.321l.801-1.388a1.699 1.699 0 0 1 2.32-.622A.85.85 0 0 0 5.5 2.2m4 5.8a1.5 1.5 0 1 1-3 0a1.5 1.5 0 0 1 3 0M11 8a3 3 0 1 1-6 0a3 3 0 0 1 6 0" clip-rule="evenodd"/></g><defs><clipPath id="gravityUiGear0"><path fill="currentColor" d="M0 0h16v16H0z"/></clipPath></defs></g></svg>
            <p class="text-left items-center pl-2 font-medium themed-text-white" data-i18n="settings">Settings</p>
        </a>
        <a href="#" class="flex items-center p-3 mt-2 themed-text-white themed-hover-sidebar rounded-lg transition duration-200">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 16 16">
                <path fill="currentColor" d="M8 0c4.42 0 8 3.58 8 8s-3.58 8-8 8s-8-3.58-8-8s3.58-8 8-8m0 1C4.13 1 1 4.13 1 8s3.13 7 7 7s7-3.13 7-7s-3.13-7-7-7m0 10.2a.75.75 0 1 1 0 1.5a.75.75 0 0 1 0-1.5m0-8.25a2.5 2.5 0 0 1 2.5 2.5c0 .523-.167.923-.423 1.24a3 3 0 0 1-.624.561l-.167.117c-.262.182-.451.317-.586.483a.88.88 0 0 0-.2.598v1a.5.5 0 0 1-1 0v-1c0-.519.168-.916.425-1.23c.185-.226.413-.404.616-.55l.173-.12c.26-.182.449-.318.584-.486A.9.9 0 0 0 9.5 5.45a1.5 1.5 0 0 0-3 0a.5.5 0 0 1-1 0A2.5 2.5 0 0 1 8 2.95"/></svg>
            <p class="text-left items-center pl-2 font-medium themed-text-white" data-i18n="help_info">Help & Informations</p>
        </a>
    </div>
</div>  
