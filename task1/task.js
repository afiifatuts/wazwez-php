let numbers = [2, 1, 0, 5, 6, 0];
// expected result : [2, 1, 5, 6, 0, 0]


let numbers2 = [2, 1, 0, 5, 9, 0, 6, 0];
// expected result : [2, 1,  5, 9, 6, 0, 0, 0]

function sortArrayZeroToEnd(arr) {
  const noZeroData = arr.filter((item) => {
    if (item !== 0) {
      return true
    }
  })
  const onlyZeroData = arr.filter((item) => {
    if (item === 0) {
      return true
    }
  })
  return noZeroData.concat(onlyZeroData)
}

console.log(sortArrayZeroToEnd(numbers2), "check")

// task 2

let a =200;
let b =400;
let c;

c = a;
a =b;
b =c;
console.log(a)
console.log(b)

// task 3
let word = "P R O G R A M M E R";
const myArray = text.split(" ");

function pattern(n){
    for (i=0; i<n; i++){
        for (j=0; j<n; j++){
            if(i==j || i==n -1-j){
            console.log(myArray)
        } else{
            console.log("=")
        }
        
        }
        console.log("mm")
    }
}

pattern(10)