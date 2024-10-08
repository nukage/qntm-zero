const fs = require('fs');
const path = require('path');

const boilerplateFolder = './resources/blocks';

async function createBoilerplate(blockName) {
    
  try {
 // Ask the user for the block name
 const blockName = await askUser('Enter the block name: ');

 // Create the block folder
 const blockPath = path.join(boilerplateFolder, blockName);
 if (!fs.existsSync(blockPath)) {
   fs.mkdirSync(blockPath, { recursive: true });
 }
    
 

    // Create the necessary files
    const filesToCreate = [
      { name: `${blockName}.php`, content: `<?php // Block logic here\n` },
      { name: 'block.json', content: JSON.stringify({ name: blockName }, null, 2) },
      { name: 'acf.json', content: JSON.stringify({ name: blockName }, null, 2) },
    ];

    for (const file of filesToCreate) {
      const filePath = path.join(blockPath, file.name);
      fs.writeFileSync(filePath, file.content);
      console.log(`Created ${filePath}`);
    }

    // Ask the user about script and CSS files
    const createScript = await askUser('Do you want to create a script file? (y/n): ');
    if (createScript.toLowerCase() === 'y') {
      const scriptPath = path.join(blockPath, `${blockName}.js`);
      fs.writeFileSync(scriptPath, `// Script logic here\n`);
      console.log(`Created ${scriptPath}`);
    }

    const createCss = await askUser('Do you want to create a CSS file? (y/n): ');
    if (createCss.toLowerCase() === 'y') {
      const cssPath = path.join(blockPath, `${blockName}.css`);
      fs.writeFileSync(cssPath, `/* CSS styles here */\n`);
      console.log(`Created ${cssPath}`);
    }

    console.log('Boilerplate files created successfully!');
  } catch (error) {
    console.error('Error creating boilerplate files:', error);
  }
}

async function askUser(question) {
  const readline = require('readline');
  const rl = readline.createInterface({
    input: process.stdin,
    output: process.stdout,
  });

  return new Promise((resolve) => {
    rl.question(question, (answer) => {
      rl.close();
      resolve(answer);
    });
  });
}

const blockName = process.argv[2];


  createBoilerplate(blockName);
