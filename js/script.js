        const tasktab = document.getElementById('tasktab');
        const crttask = document.getElementById('crttask');
        const cnclbtntk = document.getElementById('cancelbtntk');


        crttask.addEventListener('click', function () {
            tasktab.classList.toggle('hidden');

            listtab.classList.add('hidden');
            tagtab.classList.add('hidden');
        });

        cnclbtntk.addEventListener('click', function () {
            tasktab.classList.toggle('hidden');
         });


        const listtab = document.getElementById('listtab');
        const crtlist = document.getElementById('crtlist');
        const cnclbtnls = document.getElementById('cancelbtnls');

        crtlist.addEventListener('click', function () {
            listtab.classList.toggle('hidden');

            tasktab.classList.add('hidden');
            tagtab.classList.add('hidden');
        });

        cnclbtnls.addEventListener('click', function () {
            listtab.classList.toggle('hidden');
         });


        const tagtab = document.getElementById('tagtab');
        const crttag = document.getElementById('crttag');
        const cnclbtntg = document.getElementById('cancelbtntg');
        

            crttag.addEventListener('click', function () {
            tagtab.classList.toggle('hidden');
            

            listtab.classList.add('hidden');
            tasktab.classList.add('hidden');
        });

            cnclbtntg.addEventListener('click', function () {
            tagtab.classList.toggle('hidden');
         });



        ///////////////////////////////////////////////////////////

        const todaybtn = document.getElementById('today-btn');
        const todaytask = document.getElementById('today-task');
        const compbtn = document.getElementById('comp-btn');
        const comptask = document.getElementById('complete-task');

        todaybtn.addEventListener('click', function () {
            comptask.classList.add('hidden');
            todaytask.classList.remove('hidden');


            todaybtn.classList.add("bg-white/60");

            compbtn.classList.remove("bg-white/60");
           
         });

        compbtn.addEventListener('click', function () {
            todaytask.classList.add('hidden');
            comptask.classList.remove('hidden');


            todaybtn.classList.remove("bg-white/60");

            compbtn.classList.add("bg-white/60");

         });


        ///////////////////////////////////////////////////////////

        const settingBtn = document.getElementById('sett-btn');
        const closeModalBtn = document.getElementById('close-modal-btn');
        const modalOverlay = document.getElementById('modal-overlay');
        const settingsModal = document.getElementById('settings-modal');
        
    settingBtn.addEventListener('click', function () {
            modalOverlay.classList.toggle('hidden');
            settingsModal.classList.toggle('hidden');
    });

    closeModalBtn.addEventListener('click', function () {
            modalOverlay.classList.toggle('hidden');
            settingsModal.classList.toggle('hidden');
    });


    

