/*
 * Copyright (c) 2014, Facebook, Inc.
 * All rights reserved.
 *
 * This source code is licensed under the BSD-style license found in the
 * LICENSE file in the root directory of this source tree. An additional grant
 * of patent rights can be found in the PATENTS file in the same directory.
 *
 * TodoActions
 */

var $ = require("jquery");

var AppDispatcher = require('../dispatcher/AppDispatcher');
var TodoConstants = require('../constants/TodoConstants');

var TodoActions = {

  getAll: function() {},

  /**
   * @param  {string} text
   */
  create: function(text) {

    $.ajax({
      cache:false,
      type: "POST",
      url: "/todos",
      data: {
        text: text
      }
    })
    .done(function(res) {
      AppDispatcher.dispatch({
        actionType: TodoConstants.TODO_CREATE,
        id  : res.id,
        text: text
      });
    })
    .fail(function() {
    })
    .always(function() {
    });

  },

  /**
   * @param  {string} id The ID of the ToDo item
   * @param  {string} text
   */
  updateText: function(id, text) {

    $.ajax({
      cache:false,
      type: "PUT",
      url: "/todos/" + id,
      data: {
        text: text
      }
    })
    .done(function(res) {
      AppDispatcher.dispatch({
        actionType: TodoConstants.TODO_UPDATE_TEXT,
        id: id,
        text: text
      });
    })
    .fail(function() {
    })
    .always(function() {
    });



  },

  /**
   * Toggle whether a single ToDo is complete
   * @param  {object} todo
   */
  toggleComplete: function(todo) {
    var id = todo.id;

    $.ajax({
      cache:false,
      type: "PUT",
      url: "/complete/" + id,
      data: {
        complete: todo.complete
      }
    })
    .done(function(res) {
      if (todo.complete) {
        AppDispatcher.dispatch({
          actionType: TodoConstants.TODO_UNDO_COMPLETE,
          id: id
        });
      } else {
        AppDispatcher.dispatch({
          actionType: TodoConstants.TODO_COMPLETE,
          id: id
        });
      }
    })
    .fail(function() {
    })
    .always(function() {
    });











  },

  /**
   * Mark all ToDos as complete
   */
  toggleCompleteAll: function() {
    AppDispatcher.dispatch({
      actionType: TodoConstants.TODO_TOGGLE_COMPLETE_ALL
    });
  },

  /**
   * @param  {string} id
   */
  destroy: function(id) {

    $.ajax({
      cache:false,
      type: "DELETE",
      url: "/todos/" + id
    })
    .done(function(res) {
      AppDispatcher.dispatch({
        actionType: TodoConstants.TODO_DESTROY,
        id: id
      });
    })
    .fail(function() {
    })
    .always(function() {
    });

  },

  /**
   * Delete all the completed ToDos
   */
  destroyCompleted: function() {
    AppDispatcher.dispatch({
      actionType: TodoConstants.TODO_DESTROY_COMPLETED
    });
  }

};

module.exports = TodoActions;
