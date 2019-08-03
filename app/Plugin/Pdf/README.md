# Pdf

Plugin do Make Pdf para Cakephp Apps

## Instalação

Clone o projeto na pasta /cake/plugins

```
cd ~/cake/plugins
git clone git@github.com:aelian-repo/Pdf.git Pdf
```

Clone o projeto [make-pdf](https://github.com/aelian-repo/make-pdf) na pasta *Vendor* do plugin:

```
cd ~/cake/plugins/Pdf/Vendor
git clone git@github.com:aelian-repo/make-pdf.git make-pdf
```

## Como funciona

Carregue o plugin no bootstrap.php do app:

```
CakePlugin::loadAll(array(
    'Pdf' => array('bootstrap' => true)
));
```

Declare o Report e o Document no AppController:

```
public $helpers = array(
    'Pdf.Document',
    'Pdf.Report', 
);  
```

Execute a impressão no arquivo .ctp:

```
$settings = array(
    'orientation' => 'P',
    'templateFile' => 'template.xml',
    'records' => $records
);

$this->Report->create($settings);
```


