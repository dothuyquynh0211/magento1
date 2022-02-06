<?php
namespace AHT\SalesAgent\Api;

interface SaleAgentRepositoryInterface
{
    /**
     * Save Post.
     *
     * @param \AHT\SalesAgent\Api\Data\SaleAgentInterface $saleAgent
     * 
     * @return \AHT\SalesAgent\Api\Data\SaleAgentInterface
     */
    public function save(\AHT\SalesAgent\Api\Data\SaleAgentInterface $saleAgent);

    /**
     * Get object by id
     *
     * @return \AHT\SalesAgent\Api\Data\SaleAgentInterface
     */
    public function getById(String $id);

    /**
     * Get All
     * 
     * @return \AHT\SalesAgent\Api\Data\SaleAgentInterface
     */
    public function getList();
    
    /**
     * Create post.
     *
     * @param \AHT\SalesAgent\Api\Data\SaleAgentInterface $saleAgent
     * 
     * @return \AHT\SalesAgent\Api\Data\SaleAgentInterface
     */
    public function create(\AHT\SalesAgent\Api\Data\SaleAgentInterface $saleAgent);

    /**
     * Update post
     *
     * @param String $id
     * @param \AHT\Blog\Api\Data\SaleAgentInterface $saleAgent
     * 
     * @return null
     */
    public function update(String $id, \AHT\SalesAgent\Api\Data\SaleAgentInterface $saleAgent);

    /**
     * Delete Post by ID.
     *
     * @param string $saleAgentId
     * @return \AHT\SalesAgent\Api\Data\SaleAgentInterface
     */
    public function deleteById($saleAgentId);
}
