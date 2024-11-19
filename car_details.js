document.getElementById('bronirov').onclick = function() {
    const popup = document.getElementById('popup');
    
    
    popup.style.display = 'flex'; 
    setTimeout(() => {
        popup.classList.add('active'); 
    }, 10); 
};

document.getElementById('closeBtn').onclick = function() {
    const popup = document.getElementById('popup');
    
    popup.classList.remove('active');
    
  
    setTimeout(() => {
        popup.style.display = 'none'; 
    }, 500); 
};

