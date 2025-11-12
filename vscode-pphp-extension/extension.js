const vscode = require("vscode");

function activate(context) {
  const triggerChars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ_".split("");

  const provider = vscode.languages.registerCompletionItemProvider(
    { language: "pphp" },
    {
      provideCompletionItems(document, position) {
        // Read the current word before the cursor
        const line = document.lineAt(position).text;
        const wordRange = document.getWordRangeAtPosition(position);
        const prefix = wordRange ? document.getText(wordRange) : "";

        // Define all your snippets manually
        const snippets = [
          { label: "TY", insertText: "TYPE = ${1|dashboard,welcoming,form,list|}$0" },
          { label: "TITLE", insertText: "TITLE = $0" },
          { label: "WELCOMING", insertText: "WELCOMING = $0" },
          { label: "DESCRIPTION", insertText: "DESCRIPTION = $0" },
          { label: "FEATURE", insertText: "FEATURE = $0" },
          { label: "ITEM", insertText: "ITEM = $0" },
          { label: "LIST", insertText: "<<LIST>> ${1:item1}|${2:item2}|${3:item3}$0" },
          { label: "OBJECT", insertText: "<<OBJECT>> ${1:key1}=>${2:value1}, ${3:key2}=>${4:value2}$0" },
          { label: "OBJECTS", insertText: "<<OBJECTS>> ${1:key1}=>${2:value1}, ${3:key2}=>${4:value2} | ${5:key3}=>${6:value3}$0" },
          { label: "PPHP Template", insertText: "TYPE = ${1|dashboard,welcoming|}\nTITLE = ${2:My Title}\nWELCOMING = ${3:Welcome Message}\nDESCRIPTION = ${4:Description}\n$0" }
        ];

        // Convert to VS Code CompletionItems
        return snippets.map(snip => {
          const item = new vscode.CompletionItem(snip.label, vscode.CompletionItemKind.Snippet);
          item.insertText = new vscode.SnippetString(snip.insertText);
          return item;
        });
      }
    },
    ...triggerChars // This triggers suggestions after any letter typed
  );

  context.subscriptions.push(provider);
}

function deactivate() {}

module.exports = { activate, deactivate };
