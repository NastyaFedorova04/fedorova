function findDuplicateCharacters(str) {
    let result = [];
    let charCount = {};
  
    for (let char of str) {
      if (charCount[char]) {
        charCount[char]++;
      } else {
        charCount[char] = 1;
      }
    }
  
    for (let char in charCount) {
      if (charCount[char] > 1) {
        result.push(char);
      }
    }
  
    return result;
  }

  const inputString = "С Настей сложно, но без Насти невозможно";
  const duplicates = findDuplicateCharacters(inputString);
  console.log("Повторяющиеся символы: " + duplicates);
  