<div class="ajax">
    {{ content() }}
    <h2>Admin dashboard</h2>
    <blockquote>This page is static content and is located at app/views/dashboard/index.volt. You will be able to customize it later ! Just follow the steps bellow to get quickly started with the use of these custom tools. You will get an usable blog system with posts, categories, links and user models with frontend for public access and a backend for content management.</blockquote>
    <h3>Check that everything is well configured</h3>
    <p><b>Are Webtools well installed ?</b> go to http://localhost/phalcon/myapp/webtools.php asumming that you're reading that page at the address of http://localhost/phalcon/myapp/dashboard'.</p>
    <p>If you're experiencing toubles with assets loading (css and js files) then open app/config/config.php: and add <code> 'staticUri' => '/phalcon/myapp/'</code> after the baseUri declaration.</p>
    <p><b>Configure your database settings:</b> in app/config/config.php </p>
    <pre><code>
        'database' => [
            'adapter'     => 'Mysql',
            'host'        => 'localhost',
            'username'    => 'root',
            'password'    => 'FrnkZp03_',
            'dbname'      => 'blog',
            'charset'     => 'utf8',
        ],
    </code></pre>
    <p><b>Check write access on the app folder:</b>The code is generated by a web application, write access to the app folder should be given to webserver user (usually www-data).</p>
    <p><code>sudo chown -R www-data app</code> under linux.</p>
    <p><b>Import data in your database:</b> Use the provided blogDb.sql to do so.</p>
    <h3>Let's go !</h3>
    <p><b>Generate models:</b> Click on "Model" on the left, be sure to selet all tables and that "Define relations" is checked. And Generate !</p>
    <p>What Models and relations you'll get:</p>
    <ul>
        <li>Category, with two entry "Tutorial" and "Documentation Links"". Category has many posts and links</li>
        <li>Post, with many entries. A Post belongs to a Category and belongs to an User</li>
        <li>Image, with many entries. Here are stored in base64 encoded format the images used in the tutorial. Some custom function should be written to get them well displayed</li> 
        <li>User, with one entry "Admin". An User has many posts</li>
        <li>Link with a couple of usefull documentation links. A Link belongs to Category</li>
    </ul>
    <p><b>Generate scaffolds:</b> This will create in the admin backend area basic CRUD actions (AKA controller's actions) and the associated views. Click on "Scaffold" on the left. For each model generate a scaffold. Be sure that Controller's Base Class is ControllerAdmin and that Templates path ends with phalcon-customtools/quickstart.</p>
    
    <h3>Enjoy !</h3>
    <p><b>Manage your data:</b> You have now access on the left to all of your controllers.<p>
    <p>Now you have got a good basis. Further documentation is stored in Post model and is classified under the Tutorial Category. Note that there are no users. </p>
    <p><b>Continue reading:</b> You can now use the "Tutorial" dropdown menu on the top right.</p>
    <p>{{ link_to('dashboard/tutorial/second-step', 'Second step', 'class':'btn btn-success btn-sm')}}</p>
</div>
