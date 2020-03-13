let rows = [];
let blocks = [];
let container = document.getElementById('container');
let color = 'black';
let isRandom = false;

clearBoard();

document.getElementById('btn').onclick = function() {reset()};
document.getElementById('clr').onclick = function() {pickColor()};
document.getElementById('rnd').onclick = function() {setRandom()};

function setGrid() {
    let x = prompt("Please enter the number of rows. Must not be greater than 100.", 16);
    if(x != null && x <= 100 && x > 0) {
        let rowHeight = parseFloat((1.00 / x) * 100).toPrecision(6);;
        for(row = 0; row < x; row++) {
            rows[row] = document.createElement('div');
            rows[row].classList.add('row');
            container.appendChild(rows[row]);
            rows[row].style.height = rowHeight + '%';
            for(column = 0; column < x; column++) {
                let block = blocks[column];
                block = document.createElement('div');
                block.classList.add('block');
                rows[row].appendChild(block);
                block.style.width = rowHeight + '%';
            }
        }
    } else {
        setGrid();
    }
}

function setListener() {
    if(!isRandom){
        for(i = 0; i < rows.length; i++) {
            rows[i].addEventListener('mouseover', function(event) {
                event.target.style.backgroundColor = color;
            }, false);
        }
    } else {
        for(i = 0; i < rows.length; i++) {
            rows[i].addEventListener('mouseover', function(event) {
                event.target.style.backgroundColor = getRandomColor();
            }, false);
        }
    }
}

function setRandom() {
    if (!isRandom) {
        isRandom = true;
    } else {
        isRandom = false;
    }
    clearBoard();
}

function pickColor() {
    isRandom = false;
    color = prompt('Enter a color. Examples: "green" "blue" "#FF5733');
    clearBoard();
}

function getRandomColor() {
    let letters = '0123456789ABCDEF';
    let value = '#';
    for(var i = 0; i < 6; i++) {
        value += letters[Math.floor(Math.random() * 16)];
    }
    return value;
}

function clearBoard() {
    let allBlocks = document.getElementsByClassName('block');
    let allRows = document.getElementsByClassName('row');
    while(allBlocks.length > 0) {
        allBlocks[0].parentNode.removeChild(allBlocks[0]);
    }
    while(allRows.length > 0) {
        allRows[0].parentNode.removeChild(allRows[0]);
    }
    setGrid();
    setListener();
}

function reset() {
    color = 'black';
    isRandom = false;
    clearBoard();
}
