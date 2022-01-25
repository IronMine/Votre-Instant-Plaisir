let crud = document.querySelector("input[id$=crud]");

let nameinput = document.querySelector("input[id$=name]");

console.log(crud);
console.log(nameinput);

nameinput.addEventListener("input", (event) => {
    crud.value = nameinput.value.replace(/\s/g, "-");
    console.log(nameinput.value);
});
