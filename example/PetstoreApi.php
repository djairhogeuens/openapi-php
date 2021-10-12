<?php

use OpenApi\Attributes\Delete;
use OpenApi\Attributes\Enums\Explode;
use OpenApi\Attributes\Enums\ParameterIn;
use OpenApi\Attributes\Enums\SecuritySchemeType;
use OpenApi\Attributes\ExternalDocumentation;
use OpenApi\Attributes\Get;
use OpenApi\Attributes\Headers\Header;
use OpenApi\Attributes\Info\Contact;
use OpenApi\Attributes\Info\Info;
use OpenApi\Attributes\Info\License;
use OpenApi\Attributes\Media\Content;
use OpenApi\Attributes\Media\Schema;
use OpenApi\Attributes\Operation;
use OpenApi\Attributes\Parameter;
use OpenApi\Attributes\Parameters\RequestBody;
use OpenApi\Attributes\Post;
use OpenApi\Attributes\Put;
use OpenApi\Attributes\Responses\ApiResponse as ResponseBody;
use OpenApi\Attributes\Security\OAuthFlow;
use OpenApi\Attributes\Security\OAuthFlows;
use OpenApi\Attributes\Security\OAuthScope;
use OpenApi\Attributes\Security\SecurityRequirement;
use OpenApi\Attributes\Security\SecurityScheme;
use OpenApi\Attributes\Servers\Server;
use OpenApi\Attributes\Tags\Tag;

#[Info(
    title: "Swagger Petstore - OpenAPI 3.0",
    description: "This is a sample Pet Store Server based on the OpenAPI 3.0 specification. You can find out more about
Swagger at [http://swagger.io](http://swagger.io). In the third iteration of the pet store, we've switched to the design first approach!
You can now help us improve the API whether it's by making changes to the definition itself or to the code.
That way, with time, we can improve the API in general, and expose some of the new features in OAS3.

Some useful links:
- [The Pet Store repository](https://github.com/swagger-api/swagger-petstore)
- [The source API definition for the Pet Store](https://github.com/swagger-api/swagger-petstore/blob/master/src/main/resources/openapi.yaml)",
    termsOfService: "http://swagger.io/terms/",
    contact: new Contact(email: "apiteam@swagger.io"),
    license: new License(name: "Apache 2.0", url: "http://www.apache.org/licenses/LICENSE-2.0.html"),
    version: "1.0.6"
)]
#[ExternalDocumentation(
    description: "Find out more about Swagger",
    url: "http://swagger.io"
)]
#[Server(url: "/api/v3")]
#[Tag(
    name: "pet",
    description: "Everything about your Pets",
    externalDocs: new ExternalDocumentation(description: "Find out more", url: "http://swagger.io")
)]
#[Tag(
    name: "store",
    description: "Operations about user"
)]
#[Tag(
    name: "user",
    description: "Access to Petstore orders",
    externalDocs: new ExternalDocumentation(description: "Find out more about our store", url: "http://swagger.io")
)]
#[SecurityScheme(
    type: SecuritySchemeType::OAUTH2,
    name: "petstore_auth",
    flows: new OAuthFlows(implicit: new OAuthFlow(
        authorizationUrl: "https://petstore3.swagger.io/oauth/authorize",
        scopes: [new OAuthScope(name: "write:pets", description: "modify pets in your account")]
    ))
)]
#[SecurityScheme(
    type: SecuritySchemeType::APIKEY,
    name: "api_key",
    in: "header"
)]
interface PetstoreApi
{
    #[Put(path: "/pet")]
    #[Operation(summary: "Update an existing pet", description: "Update an existing pet by Id")]
    #[Tag(name: "pet")]
    #[ResponseBody(description: "Successful operation", responseCode: "200", content: [new Content(mediaType: "application/xml"), new Content(mediaType: "application/json")])]
    #[ResponseBody(description: "Invalid ID supplied", responseCode: "400")]
    #[ResponseBody(description: "Pet not found", responseCode: "404")]
    #[ResponseBody(description: "Validation exception", responseCode: "405")]
    #[SecurityRequirement(name: "petstore_auth", scopes: ["write:pets", "read:pets"])]
    public function updatePet(
        #[RequestBody(description: "Update an existent pet in the store", content: [new Content(mediaType: "application/json"), new Content(mediaType: "application/xml"), new Content(mediaType: "application/x-www-form-urlencoded")], required: true)]
        Pet $pet
    ): Pet;

    #[Post(path: "/pet")]
    #[Operation(summary: "Add a new pet to the store", description: "Add a new pet to the store")]
    #[Tag(name: "pet")]
    #[ResponseBody(description: "Successful operation", responseCode: "200", content: [new Content(mediaType: "application/xml"), new Content(mediaType: "application/json")])]
    #[ResponseBody(description: "Validation exception", responseCode: "405")]
    #[SecurityRequirement(name: "petstore_auth", scopes: ["write:pets", "read:pets"])]
    public function addPet(
        #[RequestBody(description: "Create a new pet in the store", content: [new Content(mediaType: "application/json"), new Content(mediaType: "application/xml"), new Content(mediaType: "application/x-www-form-urlencoded")], required: true)]
        Pet $pet
    ): Pet;

    /**
     * @return Pet[]
     */
    #[Get(path: "/pet/findByStatus")]
    #[Operation(summary: "Finds Pets by status", description: "Multiple status values can be provided with comma separated strings")]
    #[Tag(name: "pet")]
    #[ResponseBody(description: "successful operation", responseCode: "200", content: [new Content(mediaType: "application/xml"), new Content(mediaType: "application/json")])]
    #[ResponseBody(description: "Invalid status value", responseCode: "400")]
    #[SecurityRequirement(name: "petstore_auth", scopes: ["write:pets", "read:pets"])]
    public function findPetsByStatus(
        #[Parameter(in: ParameterIn::QUERY, description: "Status values that need to be considered for filter", required: false, explode: true, schema: new Schema(defaultValue: "available", allowableValues: ["available", "pending", "sold"]))]
        string $status
    ): array;

    /**
     * @param string[] $tags
     * @return Pet[]
     */
    #[Get(path: "/pet/findByTags")]
    #[Operation(summary: "Finds Pets by tags", description: "Multiple tags can be provided with comma separated strings. Use tag1, tag2, tag3 for testing.")]
    #[Tag(name: "pet")]
    #[ResponseBody(description: "successful operation", responseCode: "200", content: [new Content(mediaType: "application/xml"), new Content(mediaType: "application/json")])]
    #[ResponseBody(description: "Invalid tag value", responseCode: "400")]
    #[SecurityRequirement(name: "petstore_auth", scopes: ["write:pets", "read:pets"])]
    public function findPetsByTags(
        #[Parameter(in: ParameterIn::QUERY, description: "Tags to filter by", required: false, explode: Explode::TRUE)]
        array $tags
    ): array;

    #[Get(path: "/pet/{petId}")]
    #[Operation(summary: "Find pet by ID", description: "Returns a single pet")]
    #[Tag(name: "pet")]
    #[ResponseBody(description: "successful operation", responseCode: "200", content: [new Content(mediaType: "application/xml"), new Content(mediaType: "application/json")])]
    #[ResponseBody(description: "Invalid ID supplied", responseCode: "400")]
    #[ResponseBody(description: "Pet not found", responseCode: "404")]
    #[SecurityRequirement(name: "api_key")]
    #[SecurityRequirement(name: "petstore_auth", scopes: ["write:pets", "read:pets"])]
    public function getPetById(
        #[Parameter(in: ParameterIn::PATH, description: "ID of pet to return", required: true)]
        int $petId
    ): Pet;

    #[Post(path: "/pet/{petId}")]
    #[Operation(summary: "Updates a pet in the store with form data")]
    #[Tag(name: "pet")]
    #[ResponseBody(description: "Invalid input", responseCode: "405")]
    #[SecurityRequirement(name: "petstore_auth", scopes: ["write:pets", "read:pets"])]
    public function updatePetWithForm(
        #[Parameter(in: ParameterIn::PATH, description: "ID of pet that needs to be updated", required: true)]
        int $petId,
        #[Parameter(in: ParameterIn::QUERY, description: "Name of pet that needs to be updated")]
        string $name,
        #[Parameter(in: ParameterIn::QUERY, description: "Status of pet that needs to be updated")]
        string $status,
    ): void;

    #[Delete(path: "/pet/{petId}")]
    #[Operation(summary: "Deletes a pet")]
    #[Tag(name: "pet")]
    #[ResponseBody(description: "Invalid pet value", responseCode: "400")]
    #[SecurityRequirement(name: "petstore_auth", scopes: ["write:pets", "read:pets"])]
    public function deletePet(
        #[Parameter(in: ParameterIn::HEADER, required: false)]
        string $api_key,
        #[Parameter(in: ParameterIn::PATH, description: "Pet id to delete", required: true)]
        int $petId
    ): void;

    #[Post(path: "/pet/{petId}/uploadImage")]
    #[Operation(summary: "uploads an image")]
    #[Tag(name: "pet")]
    #[ResponseBody(description: "successful operation", responseCode: "200", content: [new Content(mediaType: "application/json")])]
    #[SecurityRequirement(name: "petstore_auth", scopes: ["write:pets", "read:pets"])]
    public function uploadFile(
        #[Parameter(in: ParameterIn::PATH, description: "ID of pet to update", required: true)]
        int $petId,
        #[Parameter(in: ParameterIn::QUERY, description: "Additional Metadata", required: false)]
        string $additionalMetadata,
        #[RequestBody(content: [new Content(mediaType: "application/octet-stream")])]
        string $image
    ): ApiResponse;

    /**
     * @return array<string, int>
     */
    #[Get(path: "/store/inventory")]
    #[Operation(summary: "Returns pet inventories by status", description: "Returns a map of status codes to quantities")]
    #[Tag(name: "store")]
    #[ResponseBody(description: "successful operation", responseCode: "200", content: [new Content(mediaType: "application/json")])]
    #[SecurityRequirement(name: "api_key")]
    public function getInventory(): array;

    #[Post(path: "/store/order")]
    #[Operation(summary: "Place an order for a pet", description: "Place a new order in the store")]
    #[Tag(name: "store")]
    #[ResponseBody(description: "successful operation", responseCode: "200", content: [new Content(mediaType: "application/json")])]
    #[ResponseBody(description: "Invalid input", responseCode: "405")]
    #[SecurityRequirement(name: "petstore_auth", scopes: ["write:pets", "read:pets"])]
    public function placeOrder(
        #[RequestBody(content: [new Content(mediaType: "application/json"), new Content(mediaType: "application/xml"), new Content(mediaType: "application/x-www-form-urlencoded")])]
        Order $order
    ): Order;

    #[Get(path: "/store/order/{orderId}")]
    #[Operation(summary: "Find purchase order by ID", description: "For valid response try integer IDs with value <= 5 or > 10. Other values will generated exceptions")]
    #[Tag(name: "store")]
    #[ResponseBody(description: "successful operation", responseCode: "200", content: [new Content(mediaType: "application/xml"), new Content(mediaType: "application/json")])]
    #[ResponseBody(description: "Invalid ID supplied", responseCode: "400")]
    #[ResponseBody(description: "Order not found", responseCode: "404")]
    public function getOrderById(
        #[Parameter(in: ParameterIn::PATH, description: "ID of order that needs to be fetched", required: true)]
        int $orderId
    ): Order;

    #[Delete(path: "/store/order/{orderId}")]
    #[Operation(summary: "Delete purchase order by ID", description: "For valid response try integer IDs with value < 1000. Anything above 1000 or nonintegers will generate API errors")]
    #[Tag(name: "store")]
    #[ResponseBody(description: "Invalid ID supplied", responseCode: "400")]
    #[ResponseBody(description: "Order not found", responseCode: "404")]
    public function deleteOrder(
        #[Parameter(in: ParameterIn::PATH, description: "ID of the order that needs to be deleted", required: true)]
        int $orderId
    ): Order;

    #[Post(path: "/user")]
    #[Operation(summary: "Create user", description: "This can only be done by the logged in user.")]
    #[Tag(name: "user")]
    #[ResponseBody(description: "successful operation", content: [new Content(mediaType: "application/json"), new Content(mediaType: "application/xml")])]
    public function createUser(
        #[RequestBody(description: "Created user object", content: [new Content(mediaType: "application/json"), new Content(mediaType: "application/xml"), new Content(mediaType: "application/x-www-form-urlencoded")])]
        User $user
    ): User;

    /**
     * @param User[] $users
     */
    #[Post(path: "/user/createWithList")]
    #[Operation(summary: "Creates list of users with given input array", description: "Creates list of users with given input array")]
    #[Tag(name: "user")]
    #[ResponseBody(description: "Successful operation", responseCode: "200", content: [new Content(mediaType: "application/json"), new Content(mediaType: "application/xml")])]
    #[ResponseBody(description: "successful operation")]
    public function createUsersWithListInput(
        #[RequestBody(content: [new Content(mediaType: "application/json")])]
        array $users
    ): User;

    #[Get(path: "/user/login")]
    #[Operation(summary: "Logs user into the system")]
    #[Tag(name: "user")]
    #[ResponseBody(description: "successful operation", responseCode: "200", headers: [new Header(name: "X-Rate-Limit", description: "calls per hour allowed by the user", schema: new Schema(type: "integer", format: "int32")), new Header(name: "X-Expires-After", description: "date in UTC when token expires", schema: new Schema(type: "string", format: "date-time"))], content: [new Content(mediaType: "application/xml"), new Content(mediaType: "application/json")])]
    #[ResponseBody(description: "Invalid username/password supplied", responseCode: "400")]
    public function loginUser(
        #[Parameter(in: ParameterIn::QUERY, description: "The user name for login", required: false)]
        string $username,
        #[Parameter(in: ParameterIn::QUERY, description: "The password for login in clear text", required: false)]
        string $password
    ): string;

    #[Get(path: "/user/logout")]
    #[Operation(summary: "Logs out current logged in user session")]
    #[Tag(name: "user")]
    #[ResponseBody(description: "successful operation")]
    public function logoutUser(): string;

    #[Get(path: "/user/{username}")]
    #[Operation(summary: "Get user by user name")]
    #[Tag(name: "user")]
    #[ResponseBody(description: "successful operation", responseCode: "200", content: [new Content(mediaType: "application/xml"), new Content(mediaType: "application/json")])]
    #[ResponseBody(description: "Invalid username supplied", responseCode: "400")]
    #[ResponseBody(description: "User not found", responseCode: "404")]
    public function getUserByName(
        #[Parameter(in: ParameterIn::PATH, description: "The name that needs to be fetched. Use user1 for testing. ", required: true)]
        string $username
    ): User;

    #[Post(path: "/user/{username}")]
    #[Operation(summary: "Update user", description: "This can only be done by the logged in user.")]
    #[Tag(name: "user")]
    #[ResponseBody(description: "successful operation", content: [new Content(mediaType: "application/json"), new Content(mediaType: "application/xml")])]
    public function updateUser(
        #[Parameter(in: ParameterIn::PATH, description: "name that need to be deleted", required: true)]
        string $username,
        #[RequestBody(description: "Update an existent user in the store", content: [new Content(mediaType: "application/json"), new Content(mediaType: "application/xml"), new Content(mediaType: "application/x-www-form-urlencoded")])]
        User $user
    ): User;

    #[Delete(path: "/user/{username}")]
    #[Operation(summary: "Delete user", description: "This can only be done by the logged in user.")]
    #[Tag(name: "user")]
    #[ResponseBody(description: "Invalid username supplied", responseCode: "400")]
    #[ResponseBody(description: "User not found", responseCode: "404")]
    public function deleteUser(
        #[Parameter(in: ParameterIn::PATH, description: "The name that needs to be deleted", required: true)]
        string $username,
        #[RequestBody(description: "Update an existent user in the store", content: [new Content(mediaType: "application/json"), new Content(mediaType: "application/xml"), new Content(mediaType: "application/x-www-form-urlencoded")])]
        User $user
    ): User;
}
