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