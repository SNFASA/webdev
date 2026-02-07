/** Sila run independenly using termial and some
 * of the fucntion may not work as expected in this
 * environment or not to hide or change into comments
 */

/**
 * let - is used to declare a block-scoped variable
 * const - is used to declare a block-scoped constant variable
 * var - is used to declare a function-scoped variable (not recommended)
 */
let userData = [
    {
        "name": "Alice",
        "age": 30,
        "email": "Lw9lS@example.com"
    },
    {
        "name": "Bob",
        "age": 25,
        "email": "eBb8V@example.com"
    },
];
//def variable 
cosnt userGreet = "Hello, welcome to our website!";

/// function 
fucntion greetUser(){
    console.log(userGreet + "Welcome," + userData.name  + "!");
}

greetUser();
//JSON DATA

// JSON.stringify is used to convert JavaScript object to JSON string
// the output will be a JSON STRING
// the function is useful for SENDING data to a web server
obj_data = JSON.stringify(userData);
console.log(obj_data);
// JSON.parse is used to convert JSON string back to JavaScript object
// the output will be a JAVASCRIPT OBJECT
// the function is useful for RECEIVING data from a web server
let parsedData = JSON.parse(obj_data);
console.log(parsedData);

/**
 * JS variables 
 * type casting:-
 *  pareInt() - converts a string to an integer
 *  parseFloat() - converts a string to a floating-point number
 *  toString() - converts a number to a string
 *  toFixed() - formats a number to a specified number of decimal places
 */

// JS input/output 
// prompt() - displays a dialog box that prompts the user for input
// alert() - displays a dialog box with an alert message
// confirm() - displays a dialog box with a confirmation message

let userName = prompt("Please enter your name:");
alert("Hello, " + userName + "! Welcome to our website.");
let isConfirmed = confirm("Do you want to proceed?");
console.log(isConfirmed);


// JS Array methods

let fruits = ["Apple", "Banana", "Cherry"];
const number = new Array(1, 2, 3, 4, 5);

//display output 
console.log(fruits[0]) // Apple 
console.log(number.length) // 5

// array operations
fruits.push("Orange"); // add to the end
fruits.pop(); // remove from the end

fruits.unshift("Mango"); // add to the beginning
fruits.shift(); // remove from the beginning

fruits.splice(1, 1, "Grapes", "Lemon"); // adding  in the middle ig array

console.log(fruits); // ["Apple", "Banana", "Cherry"]

const slicedFruits = fruits.slice(0, 2); // get a sub-array or create new array
console.log(slicedFruits); // ["Apple", "Banana"]


const index = fruits.indexOf("Banana"); // find index of an element
console.log(index); // 1

// invludes() - check if an element exists in the array
const hasCherry = fruits.includes("Cherry");
console.log(hasCherry); // true

