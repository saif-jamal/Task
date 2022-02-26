// ---------Responsive-navbar-active-animation-----------
if(!localStorage.getItem('item1'))
localStorage.setItem('item1',false);

if(!localStorage.getItem('item2'))
localStorage.setItem('item2',false);

if(!localStorage.getItem('item3'))
localStorage.setItem('item3',false);

if(!localStorage.getItem('item4'))
localStorage.setItem('item4',false);

// localStorage.setItem('item5',false);
// localStorage.setItem('item6',false);

let allnavItems=document.querySelectorAll('.liList');


function changebackground(e,n){


    if(n==1){
        localStorage.setItem('item1',true);
        localStorage.setItem('item2',false);
        localStorage.setItem('item3',false);
        localStorage.setItem('item4',false);

    }
    else if(n==2){
        localStorage.setItem('item1',false);
        localStorage.setItem('item2',true);
        localStorage.setItem('item3',false);
        localStorage.setItem('item4',false);

    }
    else if(n==3){
        localStorage.setItem('item1',false);
        localStorage.setItem('item2',false);
        localStorage.setItem('item3',true);
        localStorage.setItem('item4',false);

    }
    else if(n==4){
        localStorage.setItem('item1',false);
        localStorage.setItem('item2',false);
        localStorage.setItem('item3',false);
        localStorage.setItem('item4',true);

    }

    localStorage.setItem('headerText',e.target.querySelector('.textNav').textContent);
    document.querySelector('.headerText').innerHTML=e.target.querySelector('.textNav').textContent;
}





if(localStorage.getItem('item1')=='true'){
    for (let i=0 ;i < 4;i++){
        if(allnavItems[i].classList.contains('colornav')){
            allnavItems[i].classList.remove('colornav')
        }
    }
    allnavItems[0].classList.add('colornav');

}
if(localStorage.getItem('item2')=='true'){
    for (let i=0 ;i < 4;i++){
        if(allnavItems[i].classList.contains('colornav')){
            allnavItems[i].classList.remove('colornav')
        }
    }
    allnavItems[1].classList.add('colornav');
}
if(localStorage.getItem('item3')=='true'){
    for (let i=0 ;i < 4;i++){
        if(allnavItems[i].classList.contains('colornav')){
            allnavItems[i].classList.remove('colornav')
        }
    }
    allnavItems[2].classList.add('colornav');
}
if(localStorage.getItem('item4')=='true'){
    for (let i=0 ;i < 4;i++){
        if(allnavItems[i].classList.contains('colornav')){
            allnavItems[i].classList.remove('colornav')
        }
    }
    allnavItems[3].classList.add('colornav');
}



function showmenuANDhide(e){
    if(e.target.classList.contains('fa-bars')) {
        e.target.classList.remove('fa-bars');
        e.target.classList.add('fa-xmark');
        document.querySelector('.left').classList.add('leftslide');
    }else{
        e.target.classList.add('fa-bars');
        e.target.classList.remove('fa-xmark');
        document.querySelector('.left').classList.remove('leftslide');

    }

}

if(window.innerWidth<= 991){
    let na= document.querySelector('#btn1_');
    na.classList.remove('fa-bars');
    na.classList.add('fa-xmark');
    document.querySelector('.left').classList.add('leftslide');
}
else{
    let na= document.querySelector('#btn1_');
    na.classList.add('fa-bars');
    na.classList.remove('fa-xmark');
    document.querySelector('.left').classList.remove('leftslide');
}

window.addEventListener('resize',()=>{
    if(window.innerWidth <= 991){
        let na= document.querySelector('#btn1_');
        na.classList.remove('fa-bars');
        na.classList.add('fa-xmark');
        document.querySelector('.left').classList.add('leftslide');
    }else{
        let na= document.querySelector('#btn1_');
        na.classList.add('fa-bars');
        na.classList.remove('fa-xmark');
        document.querySelector('.left').classList.remove('leftslide');
    }
})

if(!localStorage.getItem('headerText')){
    localStorage.setItem('headerText','Dashboard');
}

//set header text of right nav
document.querySelector('.headerText').innerHTML=localStorage.getItem('headerText');


