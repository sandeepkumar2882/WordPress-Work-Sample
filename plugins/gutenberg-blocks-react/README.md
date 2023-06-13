# Description
Gutenberg Custom Blocks development with React, just start learning about it.

# File Structure
* gutenberg-custom-blocks.php. ---> main plugin file.
* build ---> It is a folder which is responsible to preview the output or have npm executed files. This folder's index.js file changes automatically. According to changes in src/index.js files.
* node_modules  ---> this folder have all the npm configuration. 
* package.json ---> this file is responsible for current plugin's meta info, scripts and dependencies also.

# Installation
``` 
$ npm install
```

# Running the App
```
$ npm run start
$ npm run build
```
* You can change it according to you, you have to go to package.json file, and make changes in "start" attribute like wp-scripts blog

# Start Creation of Custom Block

### Create package.json file (initialize node package).
``` 
$ npm init --yes
```

### add scripts commands to package.json file for build and start
 ```
 "scripts": {
 "build": "wp-scripts build",
 "start": "wp-scripts start"
},
 ```

### add all the dependencies and add package-lock.json file
```
$ npm i --save-dev @wordpress/scripts  
```

### make directories for your folder structure and block development
```
$ mkdir src
$ touch index.php
$ touch src/index.js
$ touch src/style.css
$ touch src/editor.css
```

### import @wordpress/scripts in index.js file
```
import { registerBlockType } from '@wordpress/blocks';
const { registerBlockType } = wp.blocks;
```
You can use any one of them.
Note : Make sure use one statement only not both together.

### Run command for start build
```
npm run start
npm run build
```