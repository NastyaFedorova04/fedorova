function getProductOfCosinePositive(arr) {
    let product = 1;
    for (let i = 0; i < arr.length; i++) {
      if (Math.cos(arr[i]) > 0) {
        for (let j = 0; j < i; j++) {
          product *= arr[j];
        }
        return product;
      }
    }
    return 0;
  }
  
  const arr = [2, 3, 4, 5, 6, 7, 8, 9];
  console.log(getProductOfCosinePositive(arr));
  