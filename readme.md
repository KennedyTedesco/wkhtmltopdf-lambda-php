## wkhtmltopdf-lambda-php

Converting HTML to PDF on AWS Lambda. 

Using:

- [Bref](https://bref.sh/) + [Serverless Framework](https://serverless.com/) to deploy the function;
- [wkhtmltopdf](https://wkhtmltopdf.org/) binary as a layer. If you want to compile your own layer: [Compiling wkhtmltopdf for use inside an AWS Lambda](https://tech.mybuilder.com/compiling-wkhtmltopdf-aws-lambda-with-bref-easier-than-you-think/)

**Input:**

````json
{
  "html": "<html>..."
}
````

**Output:**

Base64 PDF.

```json
JVBERi0xLjQKMSAwIG9iago8 ...
```

**Suggestion of pre-compiled layers:**

https://github.com/brandonlim-hs/wkhtmltopdf-aws-lambda-layer
