// isDiagonal  
//  - return either "diagonal" or "not diagonal" depending on 
//    whether or not the tile is along the diagonal of the square grid. 

function isDiagonal(width, tile)
{   
    var row = Math.floor((tile-1)/width);   // Math.floor returns the largest integer less than or equal to a given number
    var col = (tile-1) % width;             // %  returns the remainder of the division 

	if (row === col && tile > 0){
        return "diagonal";
    }
	else{
        return "not diagonal";
    }
}

console.log(isDiagonal(7, 1));       // expected "diagonal"
console.log(isDiagonal(7, 25));      // expected "diagonal"
console.log(isDiagonal(7, 49));      // expected "diagonal"
console.log(isDiagonal(7, 9));       // expected "diagonal"
console.log(isDiagonal(7, 24));      // expected "not diagonal"
console.log(isDiagonal(7, 27));      // expected "not diagonal"
console.log(isDiagonal(7, 29));      // expected "not diagonal"
console.log(isDiagonal(7, 0));       // expected "not diagonal"
console.log(isDiagonal(7, 2));       // expected "not diagonal"
console.log(isDiagonal(7, 8));       // expected "not diagonal"
console.log(isDiagonal(7, 50));      // expected "not diagonal"
console.log(isDiagonal(7, 43));      // expected "not diagonal"

console.log("---------------------");

console.log(isDiagonal(3,1));        // expected "diagonal"
console.log(isDiagonal(3,2));        // expected "not diagonal"
console.log(isDiagonal(3,3));        // expected "not diagonal"
console.log(isDiagonal(3,4));        // expected "not diagonal"
console.log(isDiagonal(3,5));        // expected "diagonal"
console.log(isDiagonal(3,6));        // expected "not diagonal"  
console.log(isDiagonal(3,8));        // expected "not diagonal"
console.log(isDiagonal(3,9));        // expected "diagonal"


/*=======================================*/
// isEdge 
//  -  return either "edge" or "not edge" depending on 
//     whether or not the tile is along the edge of grid

function isEdge(width, height, tile)
{   
    var row = Math.floor((tile-1)/width);   // Math.floor returns the largest integer less than or equal to a given number
    var col = (tile-1) % width;             // %  returns the remainder of the division 

	if (row != 0 && row != height-1 && col != 0 && col != width-1 ){
        return "not edge"
    }
	else{
        if (tile > width*height){
            return "not edge";
        }
        return "edge"
    }
}

console.log(isEdge(7, 8, 1));       // expected "edge"
console.log(isEdge(7, 8, 5));       // expected "edge"
console.log(isEdge(7, 8, 43));      // expected "edge"
console.log(isEdge(7, 8, 50));      // expected "edge"
console.log(isEdge(7, 8, 28));      // expected "edge"
console.log(isEdge(7, 8, 56));      // expected "edge"
console.log(isEdge(7, 8, 13));      // expected "not edge"
console.log(isEdge(7, 8, 25));      // expected "not edge"
console.log(isEdge(7, 8, 44));      // expected "not edge"
console.log(isEdge(7, 8, 57));      // expected "not edge"
console.log(isEdge(7, 8, 0));       // expected "not edge"

console.log("---------------------");

console.log(isEdge(3, 3, 1));       // expected "edge"
console.log(isEdge(3, 3, 2));       // expected "edge"
console.log(isEdge(3, 3, 3));       // expected "edge"
console.log(isEdge(3, 3, 4));       // expected "edge"
console.log(isEdge(3, 3, 5));       // expected "not edge"
console.log(isEdge(3, 3, 6));       // expected "edge"
console.log(isEdge(3, 3, 8));       // expected "edge"
console.log(isEdge(3, 3, 9));       // expected "edge"


/*=======================================*/
// isMiddleRow 
//  - return either "middle row" or "no" depending on 
//    whether or not the tile is along the middle row(s) of the grid

function isMiddleRow(width, height, tile)
{   
    var row = Math.floor((tile-1)/width);   // Math.floor returns the largest integer less than or equal to a given number
    var col = (tile-1) % width;             // %  returns the remainder of the division

	if (height % 2 == 1){
        if (row == Math.floor(height/2)){
            return "middle row";
        }
        return "no";
    }
    else{
        if (row == height / 2 || row == (height - 2) / 2 ){
            return "middle row";
        }
        return "no";
    }	
}

console.log(isMiddleRow(7, 8, 22));   // expected "middle row"
console.log(isMiddleRow(7, 8, 25));   // expected "middle row"
console.log(isMiddleRow(7, 8, 29));   // expected "middle row"
console.log(isMiddleRow(7, 8, 34));   // expected "middle row"
console.log(isMiddleRow(7, 8, 1));    // expected "no"
console.log(isMiddleRow(7, 8, 50));   // expected "no"
console.log(isMiddleRow(7, 8, 37));   // expected "no"
console.log(isMiddleRow(7, 8, 15));   // expected "no"
console.log(isMiddleRow(7, 8, 56));   // expected "no"

console.log("---------------------------");

console.log(isMiddleRow(7, 7, 22));   // expected "middle row"
console.log(isMiddleRow(7, 7, 27));   // expected "middle row"
console.log(isMiddleRow(7, 7, 29));   // expected "no"
console.log(isMiddleRow(7, 7, 45));   // expected "no"
console.log(isMiddleRow(7, 7, 7));    // expected "no"
console.log(isMiddleRow(7, 7, 21));   // expected "no"
