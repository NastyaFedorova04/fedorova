function isPalindrome(num) {
    const numAsString = Math.abs(num).toString();
    const reversedNumAsString = numAsString.split('').reverse().join('');
    return numAsString === reversedNumAsString;
  }
  
  function removePalindromeIntegers(arr) {
    return arr.filter(num => !isPalindrome(Math.trunc(num)));
  }

  const numbers = [121, 123, 345, 55, 10, 121, 232];
  const result = removePalindromeIntegers(numbers);
  console.log(result);
  