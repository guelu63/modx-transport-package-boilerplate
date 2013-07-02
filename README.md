#MODx Transport Package Boilerplate#

##Introduction##

###What Is A Transport Package###

A [Transport Package][3] is a collection of objects and files that can be used
to _"transport"_ data from one [MODx][2] installation to another; or even to
transport 3rd-Party Components in a simple, easily-manageable format. In other
words, Transport Packages can transport nearly anything - from database data,
files and even scripts to run during its install.

###Why I Made This###

While [there's a lot of documentation][9] on using and developing MODx packages
there isn't a repository of best practices when developing one. This is meant to
be just that ... a collection of commentary, examples and crowd-sourced ideas on
how to use transport packages to do _almost_ anything.

Personally, I have been able to even create entire sites using transport
packages which makes it easy for versioning and keeping a backup in case
anything goes wrong. Imagine if your site ever went down and all you had to do
is re-install MODx, give it the package using package management and reinstall?
Or if you ever messed up anything, you just reinstall the package and everything
is put back in place? Obviously, the parameters vary and maybe that isn't what
most would want. That was just one example and I'm sure that out of all the MODx
users out there, there could be tonnes of other interesting use cases.

While some of the packages I've made are more complex, I have stripped them down
to this boilerplate as a good start for most. Some of the stuff I stripped out
had private information and so I'm yet to showcase some stuff using dummy data
to avoid putting private information in the public domain. So yeah, it's
possible that there could be some stuff that's missing.

With time, (or rather it is my wish) ... this boilerplate could ultimately
create a site with examples on how to do various tasks that most would like to
know. A few examples from the top of my head would be;

* How to save to database from a form
* How to update data in the database using a form
* Example of how to handle MODx conditionals efficiently

###Requests, Contributions & Other###

If you have an issue you could;
* Fork the repo, commit a fix and send a pull request
* Post an issue [here][1] and I'll get to it when I can

_Ps: If there's something else that you'd like to inform me you can [shoot me an
email](mailto:yo@kingori.co?Subject=You're%20Awesome)._

##Requirements##

1. Webserver, running PHP ([see MODx server requirements][8])
2. MODx Revolution Install ([how to install][7])

_Ps: If MODx runs on your webserver you should be fine._

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

Below are the main folders and files in the build package. This wasn't absolutely necessary but don't you just hate opening folders just to get a hang of the structure?

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
│           │   │
│           │   ├── CHANGELOG.md
│           │   ├── LICENSE.md
│           │   └── README.md
│           │
│           ├── elements/
│           │   │
│           │   ├── chunks/
│           │   │   └── chunk.exampleChunk.tpl
│           │   │
│           │   ├── snippets/
│           │   │   └── snippet.exampleSnippet.php
│           │   │
│           │   └── templates
│           │       └── template.exampleTemplate.tpl
│           │
│           ├── lexicon/
│           │   └── en/
│           │       └── default.inc.php
│           │
│           └── model/
│               │
│               ├── modx-transport-package-boilerplate/
│               │   ├── mysql/
│               │   └── metadata.mysql.php
│               │
│               └── schema/
│                   └── modx-transport-package-boilerplate.mysql.schema.xml
│
├── .gitattributes
├── .gitignore
├── index.php
└── README.md
```

##Resources##

1. [MODx Revolution | Documentation][5] _(Official)_
2. [MODx Revolution | Overview][2] _(Official)_
3. [MODx Revolution | Transport Packages][3] _(Official)_
4. [MODx Revolution | Creating a 3rd Party Component Build Script][6] _(Official)_
5. [MODx Revolution | How To Install][7] _(Official)_
5. [MODx Revolution | Package Management][9] _(Official)_

[1]: https://github.com/itsmrwave/modx-transport-package-boilerplate/issues
[2]: http://rtfm.modx.com/display/revolution20/An+Overview+of+MODX
[3]: http://rtfm.modx.com/display/revolution20/Transport+Packages
[4]: https://github.com/itsmrwave/modx-transport-package-boilerplate/archive/master.zip
[5]: http://rtfm.modx.com/display/revolution20/Home
[6]: http://rtfm.modx.com/display/revolution20/Creating+a+3rd+Party+Component+Build+Script
[7]: http://rtfm.modx.com/display/revolution20/Installation
[8]: http://rtfm.modx.com/display/revolution20/Server+Requirements
[9]: http://rtfm.modx.com/display/revolution20/Package+Management