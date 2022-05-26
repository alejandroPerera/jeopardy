// sumList
//  - takes a non-empty list of integers, 
//    returns the sum of all elements in the list. 
 
function sumList(lst)
{
    var sum = 0;
    for (var i = 0; i <lst.length; i++){
        sum += lst[i];
    }
    return sum;
}

console.log(sumList([1,2,3,4,5]));         // expected 15
console.log(sumList([5]));                 // expected 5
console.log(sumList([5,4,3,2,1]));         // expected 15
console.log(sumList([1,3,5,4,2]));         // expected 15
console.log(sumList([1,3,5,3,5]));         // expected 17
console.log(sumList([9,1,3,9,1]));         // expected 23


/*=======================================*/
// findLast 
//  - takes a non-empty list of integers, 
//    returns the position of the last occurrence of the largest element. 

function findLast(lst)
{
    var lar = lst[0];
    var lar_index = 0;
	for (var i = 0; i < lst.length; i++){
        if (lar <= lst[i]){
            lar = lst[i];
            lar_index = i;
        }
    }
    return lar_index;
}

console.log(findLast([1,2,3,4,5]));            // expected 4
console.log(findLast([5]));                    // expected 0
console.log(findLast([5,11,-2,11]));           // expected 3
console.log(findLast([11,3,11,2]));            // expected 2
console.log(findLast([5,9,5,9,9,7,3]));        // expected 4
console.log(findLast([-9,-1,-3,-9,-1]));       // expected 4


/*=======================================*/
// sum2D 
//  - takes a non-empty, square, two-dimentional array of integers, 
//    returns the sum of all the elements in the array. 

function sum2D(arr)
{
    var sum = 0;
    for (var i = 0; i < arr.length; i++){
        sum += sumList(arr[i]);
    }
    return sum;
	}

console.log(sum2D([[1,1,1,1,1],[2,2,2,2,2],[3,3,3,3,3],[4,4,4,4,4],[5,5,5,5,5]]));    // expected 75
console.log(sum2D([[5],[5]]));                      // expected 10   // not square
console.log(sum2D([[3,-2,1],[0,-1,0],[3,-3,1]]));     // expected 2
console.log(sum2D([[1,2,3],[4,5,6],[7,8,9]]));        // expected 45

