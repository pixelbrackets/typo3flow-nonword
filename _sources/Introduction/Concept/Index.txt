Concept
^^^^^^^

- The motivation for this extension was to find any file uploaded by an
  editor which is not used anymore in the CMS

  - »uploaded files« are any files inside of /uploads/ or
    /fileadmin/user\_upload/

  - »not used« aka »orphaned« are any files which are not referenced in
    the CMS by an upload field, a link in an input field nor inside of a
    text

- Unused files waste space

- Files which are not referenced in the CMS maybe have to be removed
  from the filesystem due to legal reasons or internal specifications

- The following options have been considered to solve this task

  - Upgrade the installation to version 6.0 or above and use the FAL in
    some way – As much as I would have loved to do this, this option was
    rejected due to extravagant expenses for the given installation

  - Crawl the frontend – Probably the best way to find static files, but
    problamatic with generated images (e. g. scaled images, some images
    stored in an upload field and combined to a sprite later, everything
    made with GIFBUILDER) and hidden elements (start/stop time, hidden,
    frontend groups)

  - Search the database – Fast and easy, but misses »uploadfolder«
    definitions from TCA and is problamatic for flexforms

  - Search the backend – Crawl the TCA for fields of type »group« (upload
    fields), »input« (single line input field), »text« (textarea used with
    RTE) or »flex« (flexform) and search for file links in the matching
    database fields

    - Group: Combine path to uploadfolder and stored filename

    - Input/Text: Search for filestrings with a path to /uploads/ or
      /fileadmin/user\_upload/ with a simple regex

    - Flex: Parse the flexform and repeat the above search pattern

- It turned out that the extension »kb\_cleanfiles« by Bernhard Kraft
  does already deal with some of the requirements (like flexform
  parsing) so I decided to fork and extend it

- Since my extension was made for a specific installation and solved all
  requirements I did not take any effort in fancy options or any
  subsidiary functions

  - …but you can do this if you want, since it's Open Source and I have
    published it on GitHub (https://github.com/webit-de/typo3-orphanfiles/),
    so please fix, patch, extend or fork this extension

