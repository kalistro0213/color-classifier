const predefinedColors = ['primary color', 'secondary color', 'tertiary color', 'neutral color'];

function checkInput() {
  const input = document.getElementById("color_query").value;

  if (input === "") {
    alert("Please enter something!");
  } 
  else if (!predefinedColors.includes(input)) {
    alert(`Warning: The text that you entered is not in the predefined list of colors or not a word.`
      + `\nPlease choose from the following: ${predefinedColors.join(', ')}.`);
  }
}