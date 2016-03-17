<?php
/**
 * Sample Hooks Definition
 *
 * This is only a sample Hook Definition class, to show how one could define
 * hook definitions. If you remove this file, be sure to remove the config
 * reference to this class!
 *
 * @package   SlaxWeb\Framework
 * @author    Tomaz Lovrec <tomaz.lovrec@gmail.com>
 * @copyright 2016 (c) Tomaz Lovrec
 * @license   MIT <https://opensource.org/licenses/MIT>
 * @link      https://github.com/slaxweb/
 * @version   0.3
 */
namespace App\Hook;

class Sample extends \SlaxWeb\Hooks\Service\Definition
{
    /**
     * Define Hook Definitions
     *
     * Add Hook definitions to the Hooks container. This method needs to be
     * defined, and needs to add hook definitions to the Hook container for the
     * framework to execute your definitions properly.
     *
     * @return false
     */
    public function define()
    {
        $hook = $this->_container["newHook.factory"];
        $hook->create(
            "application.init.after",
            function() {
                $this->_container["response.service"]->addContent(
                    "Hook Executed<br />"
                );
            }
        );

        $this->_container["hooks.service"]->addHook($hook);
    }
}
