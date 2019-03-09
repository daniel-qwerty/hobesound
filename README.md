# Model Launcher

This project was generated with [Angular CLI](https://github.com/angular/angular-cli) version 1.7.4.

## Install Angular CLI

Run `npm install -g @angular/cli` Install the CLI using the npm package manager:

## Install in Development server

Run `sudo ng serve` for a dev server. Navigate to `http://localhost:4200/`.

## Build for production server

Run `sudo ng build --prod` to build the project. The build artifacts will be stored in the `dist/` directory.

## Send build to firebase server

Run `firebase login` Identify yourself in firebase with your Google account them

Run `firebase deploy` upload build to firebase hosting

## Running the Documentation wiki

Run `compodoc --serve` to execute the wiki documentation. Navigate to `http://127.0.0.1:8080`

# File Structure

## Workspace Files

`.editorconfig`	Configuration for code editors. See EditorConfig.

`.gitignore`	Specifies intentionally untracked files that Git should ignore.

`angular.json`	CLI configuration defaults for all projects in the workspace, including configuration options for build, serve, and test tools that the CLI uses, such as TSLint, Karma, and Protractor. For details, see Angular Workspace Configuration.

`node_modules`	Provides npm packages to the entire workspace.

`package.json`	Configures npm package dependencies that are available to all projects in the workspace. See npm documentation for the specific format and contents of this file.

`package-lock.json`	Provides version information for all packages installed into node_modules by the npm client. See npm documentation for details. If you use the yarn client, this file will be yarn.lock instead.

`tsconfig.json`	Default TypeScript configuration for apps in the workspace, including TypeScript and Angular template compiler options. See TypeScript Configuration.

`tslint.json`	Default TSLint configuration for apps in the workspace.

`tslint.json`	Default TSLint configuration for apps in the workspace.

`README.md`	Introductory documentation.


## Project files

`app/`	Contains the component files in which your app logic and data are defined. See details in App source folder below.

`assets/`	Contains image files and other asset files to be copied as-is when you build your application.

`environments/`	Contains build configuration options for particular target environments. By default there is an unnamed standard development environment and a production ("prod") environment. You can define additional target environment configurations.

`browserslist`	Configures sharing of target browsers and Node.js versions among various front-end tools. See Browserslist on GitHub for more information.

`favicon.ico`	An icon to use for this app in the bookmark bar.

`index.html`	The main HTML page that is served when someone visits your site. The CLI automatically adds all JavaScript and CSS files when building your app, so you typically don't need to add any <script> or<link> tags here manually.

`main.ts`	The main entry point for your app. Compiles the application with the JIT compiler and bootstraps the application's root module (AppModule) to run in the browser. You can also use the AOT compiler without changing any code by appending the --aot flag to the CLI build and serve commands.

`polyfills.ts`	Provides polyfill scripts for browser support.

`styles.sass`	Lists CSS files that supply styles for a project. The extension reflects the style preprocessor you have configured for the project.

`test.ts`	The main entry point for your unit tests, with some Angular-specific configuration. You don't typically need to edit this file.

`tsconfig.app.json`	Inherits from the workspace-wide tsconfig.json file.

`tsconfig.spec.json`	Inherits from the workspace-wide tsconfig.json file.

`tslint.json`	Inherits from the workspace-wide tslint.json file.


