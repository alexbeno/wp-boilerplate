# Git Guidelines

This document is an attempt to specify git guidelines

- [Gitignore](#gitignore)
- [Commit](#commit)
- [Author(s)](#authors)

## Gitignore

- Add `.gitignore` file with the initial commit
- Remove every dependency and files(vendors, node-modules, .DS_Store)
- Use [Gitignore.io](https://gitignore.io)

## Commit

- Only one feature per commit
- Use english
- message
	- Format: `[emoji][location][message][#bug tracker]`
		- **emoji:** The type of modification (new feature, documentation, refactoring, performance improvement, ...)
			- Use the classification from [Gitmoji](https://gitmoji.carloscuesta.me/)
		- **location:** Where is the concerned element
			- example: `Contact > Form > Error message >`
		- **message** The modification
		- **bug tracker** Potential bug tracking ID
			- Example: `#1337`