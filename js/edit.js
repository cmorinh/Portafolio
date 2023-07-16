const btnNew = document.getElementsByClassName('btn-new')[0];
btnNew.addEventListener('click', () => {
    let newProject = document.getElementById('newProject');
    newProject.classList.toggle('show');    
});

const btnReload = document.getElementsByClassName('btn-reload')[0];
btnReload.addEventListener('click', () => {
    window.location.href = 'edit.php';
});

const btnCancel = document.getElementById('btnCancel');
btnCancel.addEventListener('click', () => {
    let newProject = document.getElementById('newProject');
    newProject.classList.toggle('show');

    let idProject = document.getElementById('idProject');
    if(idProject.value !== "0") {
        window.location.href = "edit.php";
    } else {
        let inputs = document.getElementsByClassName('form-control');
        for(let i = 0; i < inputs.length; i++) {
            inputs[i].value = '';
        };
    }    
});

const iconOption = document.getElementsByClassName('fa-icon');
for(let i = 0; i < iconOption.length; i++) {
    iconOption[i].addEventListener('mouseover', () => {
        iconOption[i].classList.add('fa-bounce');
    });

    iconOption[i].addEventListener('mouseout', () => {
        iconOption[i].classList.remove('fa-bounce');
    });    
};
