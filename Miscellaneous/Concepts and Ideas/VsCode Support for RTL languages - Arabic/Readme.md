# Vs Code Support For RTL Languages [ Arabic ]

## Solution moved from stackoverflow.com 

### to folow the questoin you can click here 👉🏻 [Question](https://stackoverflow.com/questions/71700449/vscode-ide-messes-up-rtl-strings-after-selecting)

#### **_Solution_** : 

After searching a lot, I found the proper answer on one of the _VScode_ [**_repository's issues_**](https://github.com/microsoft/vscode/issues/146537). The problem was with the way the new version of _VSCode_ renders the _whitespace_. So, to solve this problem, you need to follow the below steps:

- Open VSCode command pallete by <kbd>CTRL</kbd> + <kbd>SHIFT</kbd> + <kbd>p</kbd>
- Search for _*Open Settings (JSON)*_ and click on it. It should open a _JSON_ file named _setting_.
- In this *JSON* file, add a key named _**editor.renderWhitespace**_ and assign on of the following values to it: *boundary*, *trailing* or *none*.

Your *JSON* file should look something like this:

```
{
    "editor.renderWhitespace":"boundary"
}
```

##### **NOTE**

- you can access and change the _**editor.renderWhitespace**_ using the _setting editor_.
so if you find the steps mentioned aboce frustrating, just use the _setting editor_ - using the setting icon at the right end of the VsCode window or even using the <kbd>CTRL</kbd> + <kbd>,</kbd> , and search for _**editor.renderWhitespace**_ .