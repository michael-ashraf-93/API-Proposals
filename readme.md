# About Proposal
Proposal is an application which serves sales team for generating proposals codes (Codes generator).

## The Application allows users to select code criteria:

- proposal Type: web development (WD), digital marketing (DM), or web product (WP).

- Technical Approval: Mostafa Megahed (MM), Mohamed Ansary (MA).

- Proposal Number: 00001 or could be 00002 (zerofill and auto incremental managed from code)

- Client Source: Recap (RE), Digital campaign (DC)

- Sales Agent name: Yassmin Hassan (YS), Ahmed Essam (AE) (Authintcated User)

- Additional Info: Client Name, Proposal Date, Propsal Value


## Code Examples:

- WDMM-00456-REAE

- DMMA-00457-DMYH

## What the application Can Do:

- Application deliveres data in RESTfull APIs.

- Handle simple permissions with Oauth (JWT) link: View all proposals, show Single proposal, Create new proposal, Update existed proposals, Delete proposals.

- The Authenticated User can see His/Her own proposals.

<hr>

<p><strong>Allowed HTTPs requests:-</strong></p>
<ul>
        <p><code>GET</code>     : Get a resource or list of resources</p>
        <p><code>POST</code>    : Update resource</p>
<li>

<ul>
    <li>
        <p>200 <code>OK</code> - the request was successful (some API calls may return 201 instead).</p>
    </li>
    <li>
        <p>201 <code>Created</code> - the request was successful and a resource was created.</p>
    </li>
    <li>
        <p>204 <code>No Content</code> - the request was successful but there is no representation to return (i.e. the response is empty).</p>
    </li>
    <li>
        <p>400 <code>Bad Request</code> - the request could not be understood or was missing required parameters.</p>
    </li>
    <li>
        <p>401 <code>Unauthorized</code> - authentication failed or user doesn't have permissions for requested operation.</p>
    </li>
    <li>
        <p>403 <code>Forbidden</code> - access denied.</p>
    </li>
    <li>
        <p>404 <code>Not Found</code> - resource was not found.</p>
    </li>
    <li>
        <p>405 <code>Method Not Allowed</code> - requested method is not supported for resource.</p>
    </li>
</ul>

<hr>

<p><strong>User attributes:</strong></p>
<ul>
    <li>
        <p>id <code>(Number)</code> : unique|identifier|incremental.</p>
    </li>
    <li>
        <p>first_name <code>(String)</code> : First Name.</p>
    </li>
    <li>
        <p>last_name <code>(String)</code> : Last Name.</p>
    </li>
    <li>
        <p>email <code>(String)</code> : Email|unique.</p>
    </li>
    <li>
        <p>password <code>(String)</code> : Password|Confirmed.</p>
    </li>
</ul>

<p><strong>Proposal attributes:</strong></p>
<ul>
    <li>
        <p>id <code>(integer)</code> : unique|identifier|incremental.</p>
    </li>
    <li>
        <p>user_id <code>(integer)</code> : forign key for user's id.</p>
    </li>
    <li>
        <p>proposal_type <code>(String)</code></p>
    </li>
    <li>
        <p>technical_approval <code>(String)</code></p>
    </li>
    <li>
        <p>proposal_number <code>(String)</code></p>
    </li>
    <li>
        <p>client_source <code>(String)</code></p>
    </li>
    <li>
        <p>sales_agent <code>(String)</code></p>
    </li>
    <li>
        <p>client_name <code>(String)</code></p>
    </li>
    <li>
        <p>proposal_date <code>(String)</code></p>
    </li>
    <li>
        <p>proposal_value <code>(String)</code></p>
    </li>
    <li>
        <p>proposal_code <code>(String)</code></p>
    </li>
</ul>
<hr>

<h1 class="resourceName">User</h1>
<p><strong>Registration.</strong></p>
<p><code>POST</code> : http://127.0.0.1:8000/api/registration</p>
<p>Response</p>
<code>200</code>
<p>Create and Retrieve the New User's Data with The Token.</p>

<hr>
<p><strong>Login.</strong></p>
<p><code>POST</code> : http://127.0.0.1:8000/api/login</p>
<p>Response</p>
<code>200</code>
<p>Attempt to Login and if the Credential (Email and Password) are Corect Retrieve The Token.</p>

<hr>
<p><strong>Logout.</strong></p>
<p><code>POST</code> : http://127.0.0.1:8000/api/logout</p>
<p>Response</p>
<div class="docs-request-headers"><h4 class="pm-h4">Headers</h4><table class="pm-table docs-request-table"><tbody><tr><td class="weight--medium">Content-Type</td><td>application/json</td></tr><tr><td class="weight--medium">Authorization</td><td>bearer {{token}}</td></tr></tbody></table></div>
<code>200</code>
<p>Delete Session And Retrieve a Message "Come Back Soon"</p>
<code>401</code>
<p>Retrieve error: Unauthenticated token.</p>

<hr>

<h1 class="resourceName">Proposal</h1>
<p><strong>Retrieve list of All Proposals.</strong></p>
<p><code>GET</code> : http://127.0.0.1:8000/api/</p>
<p>Response</p>
<div class="docs-request-headers"><h4 class="pm-h4">Headers</h4><table class="pm-table docs-request-table"><tbody><tr><td class="weight--medium">Content-Type</td><td>application/json</td></tr><tr><td class="weight--medium">Authorization</td><td>bearer {{token}}</td></tr></tbody></table></div>
<code>200</code>
<p>Retrieve list of All Proposals.</p>
<code>401</code>
<p>Retrieve error: Unauthenticated token.</p>

<hr>

<p><strong>Show Single Proposal.</strong></p>
<p><code>GET</code> : http://127.0.0.1:8000/api/show/{id}</p>
<p>Response</p>
<div class="docs-request-headers"><h4 class="pm-h4">Headers</h4><table class="pm-table docs-request-table"><tbody><tr><td class="weight--medium">Content-Type</td><td>application/json</td></tr><tr><td class="weight--medium">Authorization</td><td>bearer {{token}}</td></tr></tbody></table></div>
<code>200</code>
<p>Retrieve Selected Proposal.</p>
<code>401</code>
<p>Retrieve error: Unauthenticated token.</p>

<hr>

<p><strong>Retrieve list of All Proposals Related to the Authenticated User.</strong></p>
<p><code>GET</code> : http://127.0.0.1:8000/api/show-my-proposals</p>
<p>Response</p>
<div class="docs-request-headers"><h4 class="pm-h4">Headers</h4><table class="pm-table docs-request-table"><tbody><tr><td class="weight--medium">Content-Type</td><td>application/json</td></tr><tr><td class="weight--medium">Authorization</td><td>bearer {{token}}</td></tr></tbody></table></div>
<code>200</code>
<p>Retrieve list of All Proposals Related to the Authenticated User.</p>
<code>401</code>
<p>Retrieve error: Unauthenticated token.</p>

<hr>

<p><strong>Create New Proposal With Proposal code.</strong></p>
<p><code>POST</code> : http://127.0.0.1:8000/api/create</p>
<p>Response</p>
<div class="docs-request-headers"><h4 class="pm-h4">Headers</h4><table class="pm-table docs-request-table"><tbody><tr><td class="weight--medium">Content-Type</td><td>application/json</td></tr><tr><td class="weight--medium">Authorization</td><td>bearer {{token}}</td></tr></tbody></table></div>
<code>200</code>
<p>Create and Retrieve the Proposal.</p>
<code>401</code>
<p>Retrieve error: Unauthenticated token.</p>

<hr>

<p><strong>Update Existed Proposal and Proposal code(according to new data).</strong></p>
<p><code>POST</code> : http://127.0.0.1:8000/api/update/{id}</p>
<p>Response</p>
<div class="docs-request-headers"><h4 class="pm-h4">Headers</h4><table class="pm-table docs-request-table"><tbody><tr><td class="weight--medium">Content-Type</td><td>application/json</td></tr><tr><td class="weight--medium">Authorization</td><td>bearer {{token}}</td></tr></tbody></table></div>
<code>200</code>
<p>Update the Selected Proposal and Retrieve the new data of Proposal with the New Generated Code.</p>
<code>401</code>
<p>Retrieve error: Unauthenticated token.</p>

<hr>

Delete Proposal.
<p><code>POST</code> : http://127.0.0.1:8000/api/delete/{id}</p>
<p>Response</p>
<div class="docs-request-headers"><h4 class="pm-h4">Headers</h4><table class="pm-table docs-request-table"><tbody><tr><td class="weight--medium">Content-Type</td><td>application/json</td></tr><tr><td class="weight--medium">Authorization</td><td>bearer {{token}}</td></tr></tbody></table></div>
<code>200</code>
<p>Delete the selected Proposal and Retrieve Success message "Proposal deleted successfully".</p>
<code>401</code>
<p>Retrieve error: Unauthenticated token.</p>
