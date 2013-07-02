#MODx Transport Package Boilerplate#

##What Is A Transport Package##

A [Transport Package][3] is a collection of objects and files that can be used
to _"transport"_ data from one [MODx][2] installation to another; or even to
transport 3rd-Party Components in a simple, easily-manageable format. In other
words, Transport Packages can transport nearly anything - from database data,
files and even scripts to run during its install.

##Requirements##

1. Webserver, running PHP ([see MODx server requirements][8])
2. MODx Revolution Install ([how to install][7])

##How To Use##

###Simplified###

1. [Download the boilerplate from here][4].
2. Setup the config file for the build script.
3. Edit the content of the build package if you wish. This is optional, however 
   on initial download the build package contains nothing as this is just a 
   boilerplate. However for most, the code that has been commented out serves to
    give a good idea of how to proceed where necessary.
4. Run the script. There's an `index.php` file in the root folder of the build 
   script that will give you a good headstart. Generate the schema and map files
    first then generate the transport package.
5. The transport package should now be ready ... install it in your local MODx 
   installation or upload it to your remote MODx installation.

##File Structure##

Below are the main folders and files in the build package;

```
/
│
├── _build/
│    ├── data/
│    │   ├── transport.chunks.php
│    │   ├── transport.permissions.context.php
│    │   ├── transport.permissions.resourcegroup.php
│    │   ├── transport.permissions.resourcetoresourcegroup.php
│    │   ├── transport.plugins.php
│    │   ├── transport.resourcegroups.php
│    │   ├── transport.resources.php
│    │   ├── transport.settings.php
│    │   ├── transport.snippets.php
│    │   ├── transport.templates.php
│    │   ├── transport.tvs.php
│    │   ├── transport.usergroups.php
│    │   └── transport.userroles.php
│    │
│    ├── includes/
│    │   └── functions.php
│    │
│    ├── resolvers/
│    │   └── resolve.example.php
│    │
│    ├── build.config.php
│    ├── build.config.sample.linux.php
│    ├── build.config.sample.mac.php
│    ├── build.config.sample.linux.php
│    ├── build.config.sample.windows.php
│    ├── build.schema.php
│    ├── build.transport.php
│    └── setup.options.php
│
├── assets/
│   └── components/
│       └── modx-transport-package-boilerplate/
│
├── core/
│   └── components/
│       └── modx-transport-package-boilerplate/
│           ├── docs/
│           │   ├── CHANGELOG.md
│           │   ├── LICENSE.md
│           │   └── README.md
│           │
│           ├── elements/
│           │   ├── chunks/
│           │   ├── snippets/
│           │   └── templates
│           │
│           ├── lexicon/
│           │   └── en/
│           │
│           └── model/
│               ├──modx-transport-package-boilerplate/
│               └── schema/
│
├── .gitattributes
├── .gitignore
├── index.php
└── README.md
```

##Resources##

1. [MODx Revolution | Documentation][5]
2. [MODx Revolution | Overview][2]
3. [MODx Revolution | Transport Packages][3]
4. [MODx Revolution | Creating a 3rd Party Component Build Script][6]
5. [MODx Revolution | How To Install][7]

[1]: https://github.com/itsmrwave/modx-transport-package-boilerplate/issues
[2]: http://rtfm.modx.com/display/revolution20/An+Overview+of+MODX
[3]: http://rtfm.modx.com/display/revolution20/Transport+Packages
[4]: https://github.com/itsmrwave/modx-transport-package-boilerplate/archive/master.zip
[5]: http://rtfm.modx.com/display/revolution20/Home
[6]: http://rtfm.modx.com/display/revolution20/Creating+a+3rd+Party+Component+Build+Script
[7]: http://rtfm.modx.com/display/revolution20/Installation
[8]: http://rtfm.modx.com/display/revolution20/Server+Requirements