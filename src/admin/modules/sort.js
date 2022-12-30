const getCellValue = (tr, idx) =>
    tr.children[idx].innerText || tr.children[idx].textContent;
  

var comparer = function(idx, asc) { 
    return function(a, b) {
        return function(v1, v2) {
            return (v1 !== '' && v2 !== '' && !isNaN(v1) && !isNaN(v2)) 
                ? v1 - v2 : v1.toString().localeCompare(v2);
        }(getCellValue(asc ? a : b, idx), getCellValue(asc ? b : a, idx));
    }
};
var count = 0;
document.querySelectorAll('th.sortable').forEach(th => th.addEventListener('click', (() => {                      
    const table = th.closest('table');                
    const tbody = table.querySelector('tbody');
    Array.from(tbody.querySelectorAll('tr'))
        .sort(comparer(Array.from(th.parentNode.children).indexOf(th), this.asc = !this.asc))
        .forEach(tr => tbody.appendChild(tr));              
    
    if (count%2!=0) {
        editArrow();
        th.classList.remove('asc');
        th.classList.add('dsc');
        
    } else {
        editArrow();
        th.classList.remove('dsc');
        th.classList.add('asc');
    }
    count++;
      
})));

function editArrow() {
    document.querySelectorAll('th.sortable').forEach(th => {
        th.classList.remove('asc');
        th.classList.remove('dsc');
    });
}