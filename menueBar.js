function openMenue(){
    document.querySelector('.menueListContainer').style.display='block';
    var menue = document.getElementById('listContainer');
    var count = -1;
    var inter = setInterval(()=>{
        count++;
        menue.style.left =count+'%';
        
        if(count == 0){
            clearInterval(inter);
        }
    },50);
};

function closeMenue(){
    var menue = document.getElementById('listContainer');
    var count = -99;
    var inter = setInterval(()=>{
        count--;
        menue.style.left =count+'%';
        
        if(count == -100){
            clearInterval(inter);
            document.querySelector('.menueListContainer').style.display='none';
        }
    },50);
}

